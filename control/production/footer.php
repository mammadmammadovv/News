 <!-- footer content -->
 <footer>
   <div class="pull-right">
   
   </div>
   <div class="clearfix"></div>
 </footer>
 <!-- /footer content -->
 </div>
 </div>

 <!-- jQuery -->
 <!-- Bootstrap -->
 <!-- FastClick -->



 <!-- -- - - -- - - -  -->
 <!-- jQuery -->
 <script src="../vendors/jquery/dist/jquery.min.js"></script>
 <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
 <script src="../vendors/ck/ckeditor/ckeditor.js"></script>
 <script src="../vendors/ck/ckfinder/ckfinder.js"></script>
 <script src="../vendors/select2/dist/js/select2.full.min.js"></script>

 <!-- Bootstrap -->
 <!-- FastClick -->
 <!-- NProgress -->
 <!-- Chart.js -->
 <!-- gauge.js -->
 <!-- bootstrap-progressbar -->
 <!-- iCheck -->
 <!-- Skycons -->
 <!-- Flot -->
 <!-- Flot plugins -->
 <!-- DateJS -->
 <!-- JQVMap -->
 <!-- bootstrap-daterangepicker -->

 <!-- Custom Theme Scripts -->
 <script src="../build/js/custom.min.js"></script>

 <script>
   CKEDITOR.replace( 'aboutus_text_porto', {
    filebrowserBrowseUrl: '../vendors/ck/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '../vendors/ck/ckfinder/ckfinder.html?Type=Images',
    filebrowserUploadUrl: '../vendors/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '../vendors/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserWindowWidth : '1000',
    filebrowserWindowHeight : '700'
});
 </script>

 


 <script>
   $(document).ready(function() {
     $(".select2_single").select2({
       placeholder: "Select a state",
       allowClear: true
     });
     $(".select2_group").select2({});
     $(".select2_multiple").select2({
       maximumSelectionLength: 4,
       placeholder: "With Max Selection limit 4",
       allowClear: true
     });
   });
 </script>

 </body>

 </html>