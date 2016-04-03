<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<div class="clear-both"></div>
            <div class="hr-line" style="margin-top:36px; margin-bottom:36px;"></div>
            
            <div class="bottom-content">
                <div class="bottom-content-left">
                    <h2>WHY ANS?</h2>
                    <p>
                        Advanced Network Solutions provides comprehensive and customized IT and networking solutions to small and medium-sized businesses, healthcare facilities, and financial institutions. We perform full-service IT management for organizations with service and security needs.
                    </p>
                </div>
                <div class="bottom-nav-one">
                    <ul>
                        <li class="list-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>project-services/">PROJECT SERVICES</a></li>

                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>project-services/network-design/">NETWORK DESIGN</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>project-services/network-security/">NETWORK SECURITY</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>project-services/project-management/">PROJECT MANAGEMENT</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>project-services/cloud-services/">CLOUD SERVICES</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>project-services/disaster-recovery/">DISASTER RECOVERY</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>project-services/ip-telephony/">IP Telephony</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>project-services/remote-monitoring/">REMOTE MONITORING</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>project-services/server-virtualization/">SERVER VIRTUALIZATION</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>project-services/secure-wireless-solutions/">SECURE WIRELESS SOLUTIONS</a></li>  
                    </ul>
                </div>
                <div class="bottom-nav-two">
                    <ul>
                        <li class="list-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>key-industries/">KEY INDUSTRIES</a></li>
                        <?php
                            wp_reset_postdata();
                            $post_type = new WP_Query(array('post_type' => 'key-industry-type')); 
                        ?>
                        <?php while ( $post_type->have_posts() ) : $post_type->the_post(); ?>
						<?php $postid = get_the_ID(); ?>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>key-industries/?postId=<?php echo $postid ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; // end of the loop. ?>
                        
                    </ul>
                </div>
                <div class="bottom-nav-three">
                    <ul>
                        <li class="list-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>managed-services/">MANAGED SERVICES</a></li>

                        <?php
                            wp_reset_postdata();
                            $post_type = new WP_Query(array('post_type' => 'managed-service-type')); 
                        ?>
                        <?php while ( $post_type->have_posts() ) : $post_type->the_post(); ?>
						<?php $postid = get_the_ID(); ?>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>managed-services/?postId=<?php echo $postid ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; // end of the loop. ?>
                        <?php wp_reset_postdata(); ?>
                        <li>&nbsp;</li>
                        <li class="list-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>resources/">RESOURCES</a></li>

                        <li class="list-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>company/">COMPANY</a></li>
                    </ul>
                </div>
            </div>
            <div class="clear-both"></div>
            <div class="bottom-footer">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img style="padding-bottom:5px;" src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.jpg" alt="Advanced Network Solutions" /></a><br />
                <p style="float: left;">820 Palmer Place&nbsp;&nbsp;   <span style="color: #F78E1E;">|</span>   &nbsp;&nbsp; Nashville, TN 37203   &nbsp;&nbsp; <span style="color: #F78E1E;">|</span>&nbsp;&nbsp;    Phone: 615-277-0500</p>
                <p style="float: right;">&copy; 2014 Advanced Network Solutions. All Rights Reserved.</p>
            </div>
            <div class="clear-both"></div>
    </div><!-- #page -->
</div><!-- #wrapper -->
<?php wp_footer(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/cycle2.js"></script>
</body>
</html>