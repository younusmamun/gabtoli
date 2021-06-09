<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
            <?php if( is_active_sidebar("footer_left")){
                dynamic_sidebar("footer_left");
            }
            ?>
			</div>
            <div class="col-md-6">
				<?php if( is_active_sidebar("footer_middle")){
					dynamic_sidebar("footer_middle");
				}
				?>
                <div class="footermenu">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'=>'footermenu',
                        'menu_id'       =>'footermenucontainer',
                        'menu_class'    =>'list-inline text-right'

                    )
                );
                ?>
                </div>
            </div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
