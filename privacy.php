<?php
// Start the session
// session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<?php 

$servername = "localhost";
$username = "root";
$passwordDB = "";
$database = "glife";
$email = $_SESSION['user_email'];
$conn = mysqli_connect($servername,$username,$passwordDB,$database);
// echo $email;
$sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $R_id = $row['R_id'];
        }
    }
    $_SESSION['R_id']=$R_id;
if(!$conn)
{
    echo 'Connection Fail';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Green Life</title>

    <!-- Favicon -->
    <link rel="icon" href="F.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="images/leaf.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->

    <!-- ##### Header Area Start ##### -->
    <?php include('header.php');?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
            <h2>PRIVACY POLICYs</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Home.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">PRIVACY POLICY</li>
                            <div class="content mt-5">
    <meta charset="utf-8">
<p>The Cookware Company (USA), LLC, a Delaware limited liability company, (“<strong><u>Green Life</u>”</strong>) operates a website at <a href="https://www.greenlife-cookware.com/" title="greenlife-cookware.com">www.greenlife.com</a> (the “<strong><u>Site</u></strong>”) to enable you to learn more about Green Life and its products, purchase such products, and to contact Green Life. Green Life respects your privacy, and this policy covers Green Life’s processing, protection, transfer and use of information collected from you through the Site.</p>
<p> </p>
<p><strong>1.        </strong><strong><u>Acceptance</u>. </strong>You should review this policy carefully, and be sure you understand it, prior to using the Site.  Your use of the Site is deemed to be your acceptance of this policy.  If you do not agree to this policy, you should not use, and should immediately terminate your use of, the Site.  For purposes of this section, accessing the Site only to review this policy is not deemed to be use of the Site.</p>
<p> </p>
<p><strong>2.        </strong><strong><u>Definitions</u>. </strong>“GREEN LIFE” provides the facility for users to view the image that is related to home gardening and also upload image with caption. Users who know about plant can provide information about plant such as weather temperature, etc. and help another user in to the planting. Also buy product related to gardening. "Green Life" refers to the act of purchasing plants or related gardening products through the internet.   Plant shopping has become increasingly popular due to its convenience and the ability to access a diverse range of plants from different suppliers or nurseries located anywhere in the world. Online platforms provide detailed information about each plant, including care instructions, growth requirements, and customer reviews. This information helps buyers make informed decisions about which plants are best suited for their needs and gardening conditions.</p>
<p> </p>
<p><strong>3.        </strong><strong><u>Data Collection</u>. </strong>All Collected Data obtained from you is provided by you (or by a third party on your behalf) voluntarily, except for any Analytical Data obtained automatically through the Site as set forth in this policy.  For example, Green Life collects your name, address and payment information when you purchase a product from us.  We also collect information and content when you engage with us on social media (like when you tag us or our products and services or allow us to follow your social media profile). Regardless of how Green Life collects Collected Data, Green Life will only collect Personal Information that is (a) relevant to (i) the purposes for which it is provided by you or (ii) Green Life’s other legitimate business purposes (including, but not limited to, marketing) or (b) required by applicable law.  You are responsible for obtaining any approvals, authorizations, consents, permissions and permits that are required in connection with your providing Green Life with any information (including, but not limited to, any information relating to a third party).</p>
<p> </p>
<p><strong>4.        </strong><strong><u>Choice</u>. </strong>You may refuse to provide any information to Green Life at any time by terminating your use of the Site or notifying Green Life.  If you refuse to provide any information when requested to do so by the Site, you may not be able to access, or otherwise obtain the benefits of certain features of the Site.</p>
<p><strong><u> </u></strong></p>
<p><strong>5.        </strong><strong><u>Electronic Communications</u>. </strong>Whether or not you have previously sent Green Life an e-mail message, you consent to Green Life’s sending you e-mail messages and other electronic communications (a) in connection with your use of the Site, or (b) for any other legitimate business purpose of Green Life (including, but not limited to, marketing).  Since Green Life endeavors to send e-mail messages and other electronic communications only to individuals desiring to receive them, you can unsubscribe to such e-mail messages or other electronic communications at any time by contacting Green Life as set forth in following the “unsubscribe” directions contained in such e-mail messages or other electronic communications. </p>
<p> </p>
<p><strong>6.        </strong><strong><u>Protection</u>. </strong>Green Life will use commercially reasonable administrative and technical measures to protect Personal Information from loss and unauthorized access, alteration, destruction, disclosure and use.  Such measures shall ensure a level of protection appropriate to the specific risks identified by Green Life and in compliance with any applicable law.  Even if Green Life uses such measures, since no transmission of information over the Internet or electronic storage of information is completely secure, it is possible that Collected Data could be lost or accessed, altered, destroyed, disclosed or used without authorization.  In providing any information to Green Life, you must assume the risk that Collected Data could be lost or accessed, altered, destroyed, disclosed or used without authorization.</p>
<p> </p>
<p><strong>7.        </strong><strong><u>Use</u>. </strong>All Collected Data may be used by Green Life for any legitimate business purpose.  If Green Life expressly states in this policy or in another writing that any Collected Data will only be used for a specific purpose, Green Life will only use such Collected Data for such purpose, unless you subsequently consent to its being used for another purpose.</p>
<p> </p>
<p><strong>8.        </strong><strong><u>Transfer</u>. </strong>Any Collected Data obtained by Green Life, whether or not for a specific purpose, may be transferred to third parties relied upon by Green Life in the ordinary course of its business (including, but not limited to, any affiliates, distributors, sub-contractors or vendors of Green Life) for any purposes for which Green Life could use such Collected Data.  All such third parties shall process, protect, transfer and use such Collected Data in accordance with the provisions of this policy and Green Life shall continue to remain responsible for such Collected Data.</p>
<p> </p>
<p>Green Life may also at any time, in its sole discretion, transfer any Collected Data, whether or not you furnished such Collected Data for a specific purpose, to (a) comply with, or as permitted by, any applicable law or lawful request of a government or public authority for purposes of satisfying national security, law enforcement and other similar requirements, (b) cooperate with law enforcement, and other third parties, in investigating a claim of fraud, illegal activity or infringement of intellectual property rights, (c) protect the rights, property or legitimate business interests of Green Life or a third party, or (d) transfer such Collected Data to a third party acquiring all, or substantially all, of the assets of Green Life.  If Collected Data is transferred to a third party pursuant to this paragraph, Green Life will have no responsibility for any use of such Collected Data, or any action of, the third party to whom or which such Collected Data is transferred or for the failure of such third party to protect such Collected Data.</p>
<p> </p>
<p><strong>9.     </strong><strong><u>Required Actions</u>. </strong>Upon a request by you pursuant, Green Life will, to the extent required by any applicable law, disclose, delete or take any other action with respect to any Personal Information relating to you that is collected by Green Life.  For particular requirements related to residents of Californiass.</p>
<p> </p>
<p><strong>10.     </strong><strong><u>Data Accuracy</u>. </strong>Green Life does not warrant or represent that any Personal Information will be accurate or up-to-date. However, upon your request, Green Life will grant you access to your Personal Information in the possession, or under the control, of Green Life solely for the purpose of correcting or deleting such Personal Information that is inaccurate or has been processed in violation of this policy, except when the burden or expense of providing such access would be disproportionate to the risks to your privacy or where the rights of a third party would be violated.  If you desire access to any Personal Information for such purpose, you must contact Green Life.</p>
<p> </p>    
<p><strong>11.     </strong><strong><u>Third-Party Sites</u>. </strong>The Site may contain links to, or be accessible from, websites (including, but not limited to, social media plugins) provided by third parties (individually a “<strong><u>Third-Party Site</u></strong>”).  Your use of a Third-Party Site will be subject to its terms of use and other provisions, and you are responsible for complying with such terms and other provisions.  This policy does not cover the privacy policies or practices of any Third-Party Site, and Green Life is not responsible for any information you submit to, or otherwise collected by, any Third-Party Site.  Green Life is only responsible for Collected Data obtained by it through your authorized use of the Site.  You should consult each Third-Party Site for its privacy policy or practice before submitting any information to, or otherwise using, such Third-Party Site.</p>
<p> </p>
<p><strong>12.     </strong><strong><u>Children</u>.</strong> The Site is not directed to, or intended for, children under 13 years of age.  However, if a parent or guardian of a child who is under 13 years of age discovers that Personal Information of such child has been submitted to Green Life through the Site without the parent’s or guardian’s consent, Green Life will use commercially reasonable measures to remove such Personal Information from Green Life’s servers at the parent’s or guardian’s request.  To request the removal of such Personal Information, the parent or guardian must contact Green Life, and provide all information requested by Green Life to assist it in identifying the Personal Information to be removed.</p>
<p><strong><u> </u></strong></p>
<p><strong>13.     </strong><strong><u>California Residents</u>. </strong>Green Life does not sell or share any California Information.  A comprehensive description of Green Life’s online and offline information practices pertaining to California Information, and an explanation of the rights afforded to California residents pursuant to the California Laws, can be found at the following link: <strong><em><a href="https://www.greenpan.us/pages/caprivacy">California Privacy Disclosures</a>.</em></strong>  Green Life does not discriminate against a California resident for exercising any right of such resident under the California Laws, except as permitted under the California Laws. </p>
<p> </p>
<p><strong>14.     </strong><strong><u>Applicable Law</u>. </strong>This policy shall be governed by, and construed and interpreted in accordance with, (a) in in the case of California Information, and solely to the extent required by the California Laws, the California Laws, (b) any other applicable privacy law solely to the extent required by such law, and (c) in all other cases, the laws of New York, without regard to its principles of conflict of laws. </p>
<p> </p>
<p><strong>15.     </strong><strong><u>Complaints</u>. </strong>Any complaint by you regarding any Collected Data, or otherwise relating to this policy, must first be submitted to Green Life, and Green Life must be given a reasonable opportunity of not less than 30 days to investigate and respond to your complaint.  Upon Green Life’s completing such investigation and so responding, Green Life and you must then attempt, in good faith, to promptly resolve any remaining aspects of your complaint.  If any aspect of your complaint remains unresolved after an additional reasonable period of not less than 30 days, the dispute must be resolved in accordance with the dispute resolution procedure contained in Green Life. 
<!-- <strong><em>Terms of Use</em>.</strong></p> -->
<p> </p>
<p><strong>16.     </strong><strong><u>Entire Agreement</u>.</strong> This policy contains the entire agreement, and supersedes all prior oral and written agreements, proposals and understandings, between you and Green Life, with respect to Collected Data. </p>
<p> </p>
<p><strong>17.     </strong><strong><u>Severability</u>.</strong> Whenever possible, each provision of this policy shall be interpreted to be effective and valid under applicable law.  If, however, any such provision shall be prohibited by or invalid under such law, it shall be deemed modified to conform to the minimum requirements of such law, or if for any reason it is not so modified, it shall be prohibited or invalid only to the extent of such prohibition or invalidity without the remainder of such provision, or any other provision of this policy, being prohibited or invalid.</p>
<p> </p>
<p><strong>18.     </strong><strong><u>Revisions</u>. </strong>Green Life may revise any provision of this policy from time to time by posting the revised provision on the Site so long as such revision does not conflict with any applicable law.  Any such revision will take effect immediately upon such posting, and will apply to all Collected Data obtained by Green Life after such posting.  It is your responsibility to periodically check for revisions to this policy on the Site.  The latest version of this policy will always be the one posted on the Site.</p>
<p> </p>
<p><strong>19.     </strong><strong><u>Expenses</u>. </strong>Except as provided in this policy or by any applicable law, you are solely responsible for all fees and disbursements of any attorney or other advisor retained by you in connection with enforcing your rights under this policy.</p>
<p> </p>
  </div>
                    </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- ##### Shop Area Start ##### -->
        <div class="container mb-5">
            <section class="faq">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="plant" role="tabpanel" aria-labelledby="plant-tab">
                        <div class="card mt-4">
                            
                                <?php

                                $select_faq = mysqli_query($conn, "SELECT * FROM `faq`");
                                if (mysqli_num_rows($select_faq) > 0) {
                                    while ($fetch_faq = mysqli_fetch_assoc($select_faq)) {

                                ?>
                                        
                                <?php
                                    };
                                };
                                ?>
                                <!-- <div class="col-12 text-center">
                        <a href="#" class="btn alazea-btn">More</a>
                    </div> -->
                            </div>
                        </div>
                    </div>
            </section>
        </div>
<?php include('footer.php');?>
<!-- <Session destroy go to login page> -->
<!-- <?php
// include 'connection.php';
// {
//     session_destroy(); 
//     if(isset($_POST["log"]))
//     {
//     header("locaiton:Login.php");
//     }
// }
?> -->
<!-- <end session> -->

        <!-- ##### All Javascript Files ##### -->
        <!-- jQuery-2.2.4 js -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <!-- Popper js -->
        <script src="js/bootstrap/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <!-- All Plugins js -->
        <script src="js/plugins/plugins.js"></script>
        <!-- Active js -->
        <script src="js/active.js"></script>
</body>

</html>