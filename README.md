<img align="left" width="80" height="80" src="https://user-images.githubusercontent.com/6019313/82305874-8ad0d800-99be-11ea-8655-6d3ab5deb43f.png" alt="Omen project icon">

# &nbsp;&nbsp;&nbsp; Omen file manager

---

### **This is a Work in progress**

### A To compile

just run `yarn install` and then `yarn dev` or `yarn prod`

### B To install test within laravel

for now :

1.  add this to a laravel project with composer,
    you can use this as a local project, in your composer.json :

            "repositories": {
                "kwaadpepper/laravel-omen": {
                    "type": "path",
                    "url": "pathTo/laravel-omen-git-pull-from-github.git",
                    "options": {
                        "symlink": true
                    }
                }
            },

2.  then `composer require kwaadpepper/laravel-omen`

3.  navigate to vendor/kwaadpepper/laravel-omen and `run yarn prod`,
    then access the url `/omenfilemanager` within your laravel project

You can override `--tag=config, --tag=assets, --tag=views, --tag=lang` :

    php artisan vendor:publish --provider="Kwaadpepper\Omen\Providers\OmenServiceProvider" --tag=assets

If you are using local storage you must link the public storage to your public folder

    sudo php artisan omen:link

**Notes**

-   About contributions

    Please report any vulnerabilities found or make a PR at your convenience. Everyone is welcome.
    If you wish, you can appear on a list of contributors visible on the about page. Your GitHub information visible on the commit will be used (name and email, or just the name) If you explicitly declared it in your PR. You must agree to publish with the MIT license because the project license is defined as is.
    Your contribution will be reviewed first before the merger. Please refer to the PR section.
    If you want to report something, just open an issue ticket.

-   About CSRF

    https://cheatsheetseries.owasp.org/cheatsheets/Cross-Site_Request_Forgery_Prevention_Cheat_Sheet.html

    Use is made of the Laravel built-in CSRF system token. In addition, an Ajax CSRF token is used for every request (even if only write operation should require it).

-   About CSP policies

    https://cheatsheetseries.owasp.org/cheatsheets/Content_Security_Policy_Cheat_Sheet.html

    This lib uses a CSP strategy on all its assets requirements (CSS, JS) using nonce.
    This is configurable through the config file ('omen.csp')

-   About X-Frame-Options

    X-Frame-Options is sent to the client to prevent click jacking (iframe embed)
    https://www.keycdn.com/blog/x-frame-options
    false => X-Frame-Options: deny
    true => X-Frame-Options: sameorigin

-   About X-Content-Type-Options

    Used againts mime sniffing to prevent cross site scripting.
    Thus, any file served will be treated with the type declared by the server
    https://www.keycdn.com/support/x-content-type-options
    This is always set to no sniff, and is not configurable

-   About Referrer-Policy

    https://openweb.eu.org/articles/referrer-policy

    No tracking is needed by Omen, and it dont want to be tracked also BTW.
    So Referrer-Policy is set to no-referrer.
    This is not configurable since there is no need to.

-   About Feature-Policy

    https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy

    All enabled features are set to self, since Omen provides all the libs. No CDN is used for security purpose. Alose to enable the use on offlines networks. Only down side of this is Google Api to display
    docs wont be available.
    Only use is made of:

    -   autoplay for video
    -   fullscreen for multiple files type view
    -   layout-animations for Omen interface to display
    -   legacy-image-formats

        This policy controls the ability of the document to render images in legacy image formats. These are defined as any format other than JPEG, PNG, GIF, WEBP, or SVG.
        TODO Inspect Display possibilities on images formats

    -   midi

        TODO can midi file be played ?

    -   navigation-override

        https://github.com/w3c/webappsec-feature-policy/issues/175

    -   oversized-images
    -   picture-in-picture for video play
    -   sync-xhr For ajax queries

    accelerometer 'none'; ambient-light-sensor 'none'; autoplay 'self'; battery 'none'; camera 'none';
    display-capture 'none'; document-domain 'none'; encrypted-media 'none'; execution-while-not-rendered 'none'; execution-while-out-of-viewport 'none'; fullscreen 'self'; geolocation 'none'; gyroscope 'none';
    layout-animations 'self'; legacy-image-formats 'self'; magnetometer 'none'; microphone 'none';
    midi 'self'; navigation-override 'self'; oversized-images 'self; payment 'none'; picture-in-picture 'self';
    publickey-credentials-get 'none'; sync-xhr 'self'; usb 'none'; vr 'none'; wake-lock 'none' xr-spatial-tracking 'none';

---

**TODO:**

-   [x] multiple row figure display
-   [x] upload files
-   [x] loading screen
-   [x] remember view disposition and redo on page reload
-   [x] make directory change ajax
-   [x] fix directory create in coffee
-   [x] check sanitize path in omencontroller
-   [x] deactivate filters on ajax directory change
-   [x] handle breadcrumb click directory change
-   [x] unifiy click or double click on breadcrumb navigation
-   [ ] make button reset filters
-   [x] make upload to put files in correct path
-   [x] inject uploaded inode
-   [x] fix uploaded filerename increment
-   [x] ~create a Loading Toast, and display on ajax queries~ progressbar created
-   [x] create lock ui function to, freeze ui while navigating
-   [x] copy, move and paste function
-   [x] drag and drop
-   [x] add button selectAll
-   [x] make ping detect offline
-   [x] create csrf system for api
-   [x] handle 419 error session timeout => CSRF token mismatch
-   [x] 401 response on ping => session timeout do something
-   [x] ~find a way to use omen csrf with upload (concurrent)~ upload uses laravel csrf token
-   [ ] global search file
-   [x] select appears on figure hover for icon view and stay showed if one is selected
-   [ ] edit text files
-   [ ] Inspect Display possibilities on images formats (legacy-image-formats)
-   [ ] can midi files be played ?
-   [ ] right click menu
-   [ ] work on left panel fancy tree
-   [ ] correct file delete error not handled properly need ajax response and error handle
-   [ ] correct bu file and folder create upper case
-   [ ] support zoom in image viewer
-   [ ] add error message on text viewer ?
-   [ ] prevent share links if storage is private and url not accessible
-   [ ] polish PDF viewer
-   [ ] rework exception error codes
-   [ ] add resize and crop images
-   [ ] extensive test on mobile
-   [ ] unit tests ?
-   [ ] rework sort logic
-   [ ] implement configurable shortcuts
-   [ ] file uploaded size return to ajax is null => size sort error
-   [ ] fix sort error when only 1 inode to display
-   [ ] fix rename bug on forbidden char ?
