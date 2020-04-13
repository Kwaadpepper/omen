<div id="leftPanelMenuBar">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button id="leftPanelActionReload" type="button" class="btn btn-outline-dark mdi mdi-reload" data-toggle="tooltip" data-placement="top" title="{{ __('omen::reload') }}">
            <span class="sr-only">({{ __('omen::reload') }})</span></button>
        @if (!config('omen.forceLocale'))
        <div class="btn-group" role="group" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <button class="btn btn-outline-dark mdi mdi-translate" id="btnDropLang" type="button" data-toggle="tooltip" data-placement="top" title="{{ __('omen::languages') }}"><span class="sr-only">({{ __('omen::languages') }})</span></button>
            <div id="leftPanelLocalesList" class="dropdown-menu" aria-labelledby="btnDropLang">
                @foreach(config('omen.locales') as $locale)
                <a class="dropdown-item {{ config('omen.locale') == $locale ? 'active' : '' }}" href="#" data-locale="{{ $locale }}">{{ $locale }}<span class="sr-only">({{ __('omen::'.$locale) }})</span></a>
                @endforeach
            </div>
        </div>
        @endif
        <button type="button" class="btn btn-outline-dark mdi mdi-information-outline" data-toggle="modal" data-target="#aboutModal">
            <div class="position-absolute w-100 h-100 top-0 left-0" data-toggle="tooltip" data-placement="top" title="{{ __('omen::about') }}"></div>
            <span class="sr-only">({{ __('omen::about') }})</span>
        </button>
    </div>
</div>
<div class="d-flex flex-grow-1">
    <div id="leftPanelTreeView" class="d-block"></div>
</div>
