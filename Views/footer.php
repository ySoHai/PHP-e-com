<?php
$uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
$dirs = explode('/', $uri);
$app_path = '/' . $dirs[1] . '/Views/';
?>
    <!--  footer -->
    <footer>
        <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h3>About Us</h3>
                    <ul class="about_us">
                    <li>Website of a Advanced Web Development Project.</li>
                    </ul>
                </div>
                <div class="col-6">
                    <h3>Contact Us</h3>
                    <ul class="conta">
                    <li>contact@techtrade.com</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html Templates</a></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="<?php echo $app_path; ?>js/jquery.min.js"></script>
    <script src="<?php echo $app_path; ?>js/popper.min.js"></script>
    <script src="<?php echo $app_path; ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $app_path; ?>js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="<?php echo $app_path; ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo $app_path; ?>js/custom.js"></script>
</body>
</html>

