<script type='text/javascript' src='http://www.scribd.com/javascripts/scribd_api.js'></script>
 <script src="http://code.jquery.com/jquery-latest.js"></script>
<div id='embedded_doc'></div>

<script type="text/javascript">
  var scribd_doc = scribd.Document.getDoc(104311574, 'key-10crc3if0n8e2i5uxnh5');
  var onDocReady = function(e){
     scribd_doc.api.setPage(1);
     //scribd_doc.api.api.getViewMode();
  }
  var pageChanged = function(evn) {
        var pageCount = scribd_doc.api.getPage();
        if(pageCount > 3)
           scribd_doc.api.setPage(4);
        
      }

  scribd_doc.addEventListener('docReady', onDocReady);
  scribd_doc.addEventListener('pageChanged', pageChanged);
  scribd_doc.addParam('jsapi_version', 2);
  scribd_doc.addParam('default_embed_format', 'html5');
  scribd_doc.addParam('allow_share', true);
  scribd_doc.addParam('search_query', 'Preamble');
  scribd_doc.addParam('mode','slideshow');
 // scribd_doc.addParam("use_ssl", true);
//scribd_doc.grantAccess('User Identifier', 'Sesssion ID', 'Signature');
  //scribd_doc.addParam('default_embed_format','flash');
  scribd_doc.addParam('height', 600);
  scribd_doc.addParam('width', 600);
  scribd_doc.addParam('public', true);
  scribd_doc.write('embedded_doc');
 
</script>
<!-- <a href="http://www.scribd.com/document_downloads/104086828?extension=pdf&secret_password=1mkjuaj0koo4wwms8tyq">Download</a> -->
