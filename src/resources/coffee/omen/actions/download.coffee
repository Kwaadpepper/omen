inodes = require('./../../omenApi.coffee').inodes
ajaxCalls = require('./../../tools/ajaxCalls.coffee')
logException = require('./../../tools/logException.coffee')
ln = require('./../../tools/getLine.coffee')
trans = require('./../../tools/translate.coffee')
alert = require('./../../tools/alert.coffee')




module.exports = (action)->
    (event)->
        fileFullPath = $(this).parents('figure').data('path')
        inode = inodes[fileFullPath]

        url = if inode.visibility == 'public' then inode.url else action.url + inode.path

        # test file exists
        ajaxCalls(
            'HEAD',
            url,
            null,
            null,
            null,
            { 
                complete : (jxhr)->
                    contentLength = jxhr.getResponseHeader('Content-Length')
                    if jxhr.status is not 200 or !contentLength
                        logException("Error Occured #{jxhr.status} #{jxhr.statusText} INODE => #{inode.path} URL => #{url}", "9#{ln()}")
                        alert('danger', trans('File download error'), trans("Server could not get ${inodename}", { 'inodename': inode.name }))
                    else
                        # #Dynamic Download
                        a = document.createElement('a')
                        a.href = url
                        a.download = url
                        document.body.appendChild(a)
                        a.click()
                        document.body.removeChild(a)
            }
        )
    

        