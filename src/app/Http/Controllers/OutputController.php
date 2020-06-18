<?php

namespace Kwaadpepper\Omen\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kwaadpepper\Omen\Lib\FileManager;
use Kwaadpepper\Omen\OmenHelper;

class OutputController
{
    public function getInodeHtml(Request $request)
    {
        if (!$request->filled('filepath') and !$request->filled('directorypath')) {
            return OmenHelper::abort(400);
        }

        $inodepath = !empty($request->post('filepath')) ? $request->post('filepath') : $request->post('directorypath');

        $inodepath = OmenHelper::uploadPath($inodepath);

        $fm = new FileManager();

        if (!$fm->exists($inodepath)) {
            return OmenHelper::abort(404);
        }

        $inode = $fm->inode($inodepath);
        $view = view(
            sprintf('omen::elements.inodesView.%s', $inode->getType()),
            [
                'inode' => $inode,
                'id' => sha1($inode->getFullPath()),
                'inodeType' => $inode->getType()
            ]
        );

        return response()->json(['inode' => $inode, 'inodeHtml' => $view->render()], 200);
    }

    public function getInodesAtPath(Request $request)
    {
        if (!$request->filled('path')) {
            return OmenHelper::abort(400);
        }

        $inodepath = OmenHelper::uploadPath($request->get('path'));
        $fm = new FileManager();

        if (!$fm->exists($inodepath)) {
            return OmenHelper::abort(404);
        }

        $inodes = $fm->inodes($inodepath);
        $view = view(
            'omen::elements.inodesView.view',
            [
                'inodes' => $inodes,
                'path' => $request->get('path')
            ]
        );

        return response()->json([
            'inodes' => $inodes,
            'inodesHtml' => $view->render()
        ], 200);
    }

    public function getBreadcrumbAtPath(Request $request)
    {
        if (!$request->filled('path')) {
            return OmenHelper::abort(400);
        }

        $inodepath = OmenHelper::uploadPath($request->get('path'));
        $fm = new FileManager();

        if (!$fm->exists($inodepath)) {
            return OmenHelper::abort(404);
        }

        // session should be filled with path request
        $query = [
            'path' => Session::get('omen.path'),
            'locale' => Session::get('omen.locale')
        ];

        $view = view(
            'omen::elements.breadcrumb',
            [
                'path' => $request->get('path'),
                'query' => $query
            ]
        );

        return response()->json([
            'breadcrumbHtml' => $view->render()
        ], 200);
    }
}
