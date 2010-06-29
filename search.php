<?php get_header() ?>
    
    <div id="content" class="posts-list">
    	<div class="middle">
            <div class="main">
            	<div class="marginRight20">
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
            
			<?php locate_template( array( 'sidebar.php' ), true ) ?>
            <div class="clear"></div>
        </div>
    </div>
            
<?php get_footer() ?>
