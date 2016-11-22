Contao Multidomain Rebuild Index
=====================

Rebuilding the search index via the backend of Contao actually creates an AJAX request for every page in the sitemap of every website root of the Contao installation. Thus, in order to be able to rebuild the search index in multidomain installations you need to set custom response headers for any page request that Contao handles, due to [CORS](https://en.wikipedia.org/wiki/Cross-origin_resource_sharing). The headers are:
```
Access-Control-Allow-Headers: X-Requested-With
Access-Control-Allow-Origin: …
```
The first header is necessary, because Contao uses the MooTools `Request` class, which always adds the `X-Requested-With` request header (see [mootools.net/core/docs/1.5.2/Request/Request](http://mootools.net/core/docs/1.5.2/Request/Request)). The second header allows AJAX requests from other domains.

Adding these headers could be done via the `.htaccess`:

```
<IfModule mod_headers.c>
  Header set Access-Control-Allow-Headers: X-Requested-With
  Header set Access-Control-Allow-Origin http://example.org
</IfModule>
```

The value for the `Access-Control-Allow-Origin` header should be changed to the domain (and scheme) with which you access the Contao back end.

__However__ this does not work in every server environment for requests that are handled by PHP via FastCGI for example (see http://serverfault.com/a/383063/143519). In that case you would need to set these headers directly in the vhost configuration of Apache.

This extension helps with cases where that is not possible. By installing this extension the headers are automatically set for any front end page output. The `Access-Control-Allow-Origin` header is automatically set to the domain with which you accessed the Contao back end. No configuration is needed for this extension.

_Note:_ further problems can arise, if you use HTTPS on some of the domains. AJAX requests to resources via HTTP are not possible when using HTTPS. In that case you need to make sure that you either:

* log into the backend via HTTP
* or force HTTPS for all domains
