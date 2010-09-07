<?php get_header (); ?>
  <div id="mainContent" class="container_11">
    <div id="content" class="grid_8">
    <div id="pageContent" class="main">
      <div class="boxContent1">
                        <div id="cse-search-results"></div>
                        <script type="text/javascript">
                            var googleSearchIframeName = "cse-search-results";
                            var googleSearchFormName = "cse-search-box";
                            var googleSearchFrameWidth = 474;
                            var googleSearchDomain = "www.google.com";
                            var googleSearchPath = "/cse";
                        </script>
                        <script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
                    </div>
    </div>
    </div>
    <div id="right-column" class="grid_3">
      <?php locate_template( array( 'sidebar.php' ), true ) ?>
    </div>
    <div class="clear"></div>
</div>
<?php get_footer (); ?>