<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
<!-- Bootstrap Core CSS -->
<link href="/css/bootstrap.min.css" rel="stylesheet" />
<link href="/css/style.css" rel="stylesheet" />
<link href="/css/bootstrap-multiselect.css" rel="stylesheet" />
<link href="/css/bootstrap3-typehead.css" rel="stylesheet" />
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js" ></script>
<script src="/js/jquery.validate.min.js" ></script>
<script src="/js/bootstrap3-typeahead.js"></script>
<script src="/js/bootstrap-multiselect.js"></script>
</head>
<body>
	<div class="container">
		<header> @include('layout.header') </header>
		<div class="contents">@yield('content')</div>
		<footer> @include('layout.footer') </footer>
	</div>
	
</body>
<div id="modal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title">Notification</h4>
                </div>
                <div class="modal-body" >
                    <!-- <p>Add the <code>.modal-sm</code> class on <code>.modal-dialog</code> to create this small modal.</p>-->
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="modalButton">Ok</button>
                </div>
            </div>
        </div>
</div>
<script src="/js/custom.functions.js" ></script>
</html>