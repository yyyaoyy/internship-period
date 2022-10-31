<meta charset="utf-8">
<?php
/**
 * Author:Yao
 * Note: This email class has been successfully tested by me. If you encounter failure problems when sending emails, please check the following points:
 * 1. The user name and password are correct.
 * 2. Check whether the smtp service is enabled.
 * 3. Is it a problem with the php environment?
 * 4. 将260行的   $smtp->debug = false    to    true，
 * You can display the error message, and then you can copy the error message to the Internet to search for the cause of the error
 */
require_once "email.class.php";
//******************** Configuration information ******************************** 
$smtpserver = "smtp.163.com";//SMTP server 
$smtpserverport = 25;//SMTP server port 
$smtpusermail = "rrrrrshi@163.com";//SMTP server user email address (your own email address)
//$smtpemailto = "0302ydm@gmail.com";//Sent to who
//$smtpemailto = "wla17257@student.wli.edu.au";


//$smtpemailto = $_POST['BDMID'];//Sent to who


//if ($smtpemailto == "") {
//if ($smtpemailto == ) {
//    $smtpemailto = "wla17257@student.wli.edu.au";
    //$smtpemailto = "info@tel5.com.au";
//}


$t = $_POST['BDMID'];
if ($t == "") {
    $smtpemailto = "wla17257@student.wli.edu.au";
}
else{
    $smtpemailto =$t;
}


$smtpuser = "rrrrrshi@163.com";//SMTP server user account (your own email address)
$smtppass = "YSGGERBRRDMQSVYJ";//SMTP server user password (client authorization password for your own email address)
//$smtppass = "AYARJKICZROXTWEJ"; //mac bao 
//SMTP server user password (client authorization password for your own email address)
//YSGGERBRRDMQSVYJ

$mailtitle = "New lead information";//title

/*
$mailcontent = "<br> <td colspan=2><h1  style='text-align: center;background-color:#FFA500'>Lead Info</td></h1>      
<tr><td><h3>Query ID:</td></h3>   <td><h3>" . $_POST['LeadID']. "</td></h3></tr> 
<tr><td><h3>Date:</td></h3> <td><h3>" . $_POST['Date']. "</td></h3></tr>
<tr><td><h3>Existing customer:</td></h3> <td><h3>" . $_POST['STATUS']. "</td></h3></tr> <br>" ;
*/


$mailcontent = "<br><h1 style='text-align: center;background-color:#FFA500'>Lead Info</h1>";
$mailcontent .= "<h3>Query ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;" . $_POST['LeadID'] . "</h3>";


$mailcontent .= "<h3>Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;" . $_POST['Date'] . "</h3>";



$mailcontent .= "<h3>Existing customer:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;" . $_POST['STATUS'] . "</h3><br> ";




/*
$mailcontent .= "<br><tr><td colspan=2><h1 style='text-align: center;background-color:#FFA500'>Business Info</td></h1></tr>      
<tr><td><h3>BDM Name:</td></h3>   <td><h3>" . $_POST['BDMname']. "</td></h3></tr> 
<tr><td><h3>BDM Email ID:</td></h3>      <td><h3>" . $_POST['BDMID']. "</td></h3>  </tr>
<tr><td><h3>Business Name:</td></h3>   <td><h3>" . $_POST['Name']. "</td></h3></tr> 
<tr><td><h3>Authorised Person:</td></h3>      <td><h3>" . $_POST['AuthorisedPerson']. "</td></h3>  </tr>
<tr><td><h3>Business Contact Number:</td></h3>   <td><h3>0" . $_POST['ContactNumber']. "</td></h3></tr> 
<tr><td><h3>Business Email Address:</td></h3>      <td><h3>" . $_POST['EmailAddress']. "</td></h3>  </tr>
<tr><td><h3>Address:</td></h3>   <td><h3>" . $_POST['Address']. "</td></h3></tr> 
<tr><td><h3>Suburb:</td></h3>      <td><h3>" . $_POST['Suburb']. "</td></h3>  </tr>
<tr><td><h3>City:</td></h3>   <td><h3>" . $_POST['City']. "</td></h3></tr> 
<tr><td><h3>State:</td></h3>      <td><h3>" . $_POST['State']. "</td></h3>  </tr>
<tr><td><h3>Post Code:</td></h3>   <td><h3>" . $_POST['PostCode']. "</td></h3></tr> 
<tr><td><h3>No.of Employees:</td></h3>      <td><h3>" . $_POST['NoEmployees']. "</td></h3>  </tr>
<tr><td><h3>Industry Type:</td></h3>   <td><h3>" . $_POST['IndustryType']. "</td></h3></tr><br>" ;

*/






$mailcontent .= "<br><h1 style='text-align: center;background-color:#FFA500'>Business Info</h1>";
$mailcontent .= "<h3>BDM Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['BDMname'] . "</h3>";
$mailcontent .="<h3>BDM Email ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['BDMID'] . "</h3>";
$mailcontent .= "<h3>Business Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['Name'] . "</h3>";
$mailcontent .= "<h3>Authorised Person:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['AuthorisedPerson'] . "</h3>";
$mailcontent .= "<h3>Business Contact Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&emsp;0" . $_POST['ContactNumber'] . "</h3>";
$mailcontent .= "<h3>Business Email Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['EmailAddress'] . "</h3>";
$mailcontent .= "<h3>Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&thinsp;&emsp;&emsp;" . $_POST['Address'] . "</h3>";
$mailcontent .= "<h3>Suburb:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['Suburb'] . "</h3>";
$mailcontent .= "<h3>City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['City'] . "</h3>";
$mailcontent .="<h3>State:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['State'] . "</h3>";
$mailcontent .= "<h3>Post Code:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['PostCode'] . "</h3>";
$mailcontent .=  "<h3>No.of Employees:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;&emsp;" . $_POST['NoEmployees'] . "</h3>";
$mailcontent .= "<h3>Industry Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&nbsp;&emsp;&emsp;" . $_POST['IndustryType'] . "</h3><br>"; 





 
/*
$mailcontent .= "<br><tr><td colspan=2><h1   style='text-align: center;background-color:#FFA500'>Fixed Services</td></tr></h1>      
<tr><td><h3>Landlines:</td></h3>   <td><h3>" . $_POST['Landlines']. "</td></h3></tr> 
<tr><td><h3>Provider:</td></h3>      <td><h3>" . $_POST['Provider']. "</td></h3>  </tr>
<tr><td><h3>Type of Services:</td></h3>   <td><h3>" . $_POST['TypeofServices']. "</td></h3></tr> 
<tr><td><h3>Contract:</td></h3>      <td><h3>" . $_POST['Contract']. "</td></h3>  </tr>
<tr><td><h3>Type Of Hardware:</td></h3>   <td ><h3>" . $_POST['TypeOfHardware']. "</td></h3></tr> 
<tr><td><h3>Handsets:</td></h3>      <td><h3>" . $_POST['Handsets']. "</td></h3>  </tr>
<tr><td><h3>NBN/ADSL (Speed):</td></h3>   <td><h3>" . $_POST['NBN']. "</td></h3></tr> 
<tr><td><h3>Contract:</td></h3>      <td><h3>" . $_POST['Contract1']. "</td></h3>  </tr>
<tr><td><h3>Looking For/Notes:</td></h3>   <td><h3>" . $_POST['LookingFor']. "</td></h3></tr><br>" ;
*/




$mailcontent .= "<br><h1 style='text-align: center;background-color:#FFA500'>Fixed Services</h1>";
$mailcontent .=  "<h3>Landlines:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['Landlines'] . "</h3>";
$mailcontent .=  "<h3>Provider:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['Provider'] . "</h3>";
$mailcontent .=  "<h3>Type of Services:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['TypeofServices'] . "</h3>";
$mailcontent .=  "<h3>Contract:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['Contract'] . "</h3>";
$mailcontent .=  "<h3>Type of Hardware:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;" . $_POST['TypeOfHardware'] . "</h3>";
$mailcontent .=  "<h3>Handsets:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;&thinsp;" . $_POST['Handsets'] . "</h3>";
$mailcontent .=  "<h3>NBN/ADSL(Speed):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;" . $_POST['NBN'] . "</h3>";
$mailcontent .=  "<h3>Contract:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&emsp;&thinsp;&emsp;" . $_POST['Contract1'] . "</h3>";
$mailcontent .=  "<h3>Looking For/Notes:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['LookingFor'] . "</h3><br>";  




/*
$mailcontent .= "<br><tr><td colspan=2><h1  style='text-align: center;background-color:#FFA500'>Digital Services</td></h1> </tr>     
<tr><td><h3>Website:</td></h3>   <td><h3>" . $_POST['Website']. "</td></h3></tr> 
<tr><td><h3>Other Services:</td></h3>      <td><h3>" . $_POST['OtherServices']. "</td></h3>  </tr>
<tr><td><h3>Service Provider:</td></h3>   <td><h3>" . $_POST['ServiceProvider']. "</td></h3></tr> 
<tr><td><h3>Current Spend:</td></h3>      <td><h3>" . $_POST['CurrentSpend']. "</td></h3>  </tr>
<tr><td><h3>Looking For/Notes:</td></h3>   <td><h3>" . $_POST['LookingFor1']. "</td></h3></tr><br>" ;
*/




$mailcontent .=  "<br><h1 style='text-align: center;background-color:#FFA500'>Digital Services</h1>";
$mailcontent .=  "<h3>Website:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['Website'] . "</h3>";
$mailcontent .= "<h3>Other Services:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['OtherServices'] . "</h3>";
$mailcontent .=  "<h3>Service Provider:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['ServiceProvider'] . "</h3>";
$mailcontent .=  "<h3>Current Spend:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['CurrentSpend'] . "</h3>";
$mailcontent .=  "<h3>Looking For/Notes:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;" . $_POST['LookingFor1'] . "</h3><br>";



/*
$mailcontent .= "<br><tr><td colspan=2><h1 style='text-align: center;background-color:#FFA500'>IT Services</td></tr></h1>      
<tr><td><h3>Managed IT:</td></h3>   <td><h3>" . $_POST['ManagedIT']. "</td></h3></tr> 
<tr><td><h3>Service Provider:</td></h3>      <td><h3>" . $_POST['ServiceProvider1']. "</td></h3>  </tr>
<tr><td><h3>Type of Services:</td></h3>   <td><h3>" . $_POST['TypeofServices1']. "</td></h3></tr> 
<tr><td><h3>Type of Contract:</td></h3>      <td><h3>" . $_POST['TypeofContract']. "</td></h3>  </tr>
<tr><td><h3>Firewall:</td></h3>   <td><h3>" . $_POST['Firewall']. "</td></h3></tr> 
<tr><td><h3>Current Spend:</td></h3>      <td><h3>" . $_POST['CurrentSpend1']. "</td></h3>  </tr>
<tr><td><h3>Looking For/Notes:</td></h3>   <td><h3>" . $_POST['LookingFor2']. "</td></h3></tr><br>" ;
*/



$mailcontent .= "<br><h1 style='text-align: center;background-color:#FFA500'>IT Services</h1>";
$mailcontent .= "<h3>Managed IT:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['ManagedIT'] . "</h3>";
$mailcontent .= "<h3>Service Provider:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['ServiceProvider1'] . "</h3>";
$mailcontent .= "<h3>Type of Services:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['TypeofServices1'] . "</h3>";
$mailcontent .= "<h3>Type of Contract:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['TypeofContract'] . "</h3>";
$mailcontent .= "<h3>Firewall:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['Firewall'] . "</h3>";
$mailcontent .= "<h3>Current Spend:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['CurrentSpend1'] . "</h3>";
$mailcontent .= "<h3>Looking For/Notes:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;" . $_POST['LookingFor2'] . "</h3><br>";


    

/*
$mailcontent .= "<br><tr><td colspan=2><h1 style='text-align: center;background-color:#FFA500'>Printing Solutions</td></h1></tr>      
<tr><td><h3>Type of Machine:</td></h3>   <td><h3>" . $_POST['TypeofMachine']. "</td></h3></tr> 
<tr><td><h3>Brand:</td></h3>      <td><h3>" . $_POST['Brand']. "</td></h3>  </tr>
<tr><td><h3>Rental/Own:</td></h3>   <td><h3>" . $_POST['Rental/Own']. "</td></h3></tr> 
<tr><td><h3>Current Spend:</td></h3>      <td><h3>" . $_POST['CurrentSpend1']. "</td></h3>  </tr>
<tr><td><h3>Mono(Pages)/Month:</td></h3>   <td><h3>" . $_POST['Mono']. "</td></h3></tr> 
<tr><td><h3>Cost/Page:</td></h3>      <td><h3>" . $_POST['Cost']. "</td></h3>  </tr>
<tr><td><h3>Colour(Pages)/Month:</td></h3>   <td><h3>" . $_POST['Colour']. "</td></h3></tr> 
<tr><td><h3>Cost/Page:</td></h3>      <td><h3>" . $_POST['Cost1']. "</td></h3>  </tr>
<tr><td><h3>Drawers:</td></h3>   <td><h3>" . $_POST['Drawers']. "</td></h3></tr> 
<tr><td><h3>Dual Scanner:</td></h3>      <td><h3>" . $_POST['DualScanner']. "</td></h3>  </tr>
<tr><td><h3>Fax:</td></h3>   <td><h3>" . $_POST['Fax']. "</td></h3></tr> 
<tr><td><h3>A3:</td></h3>      <td><h3>" . $_POST['A3']. "</td></h3>  </tr>
<tr><td><h3>Software Integration:</td></h3>   <td><h3>" . $_POST['SoftwareIntegration']. "</td></h3></tr> 
<tr><td><h3>Finisher:</td></h3>      <td><h3>" . $_POST['Finisher']. "</td></h3>  </tr>
<tr><td><h3>Looking For/Notes:</td></h3>   <td><h3>" . $_POST['LookingFor3']. "</td></h3></tr><br>" ;
*/




$mailcontent .= "<br><h1 style='text-align: center;background-color:#FFA500'>Printing Solutions</h1>";
$mailcontent .= "<h3>Type of Machine:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&thinsp;" . $_POST['TypeofMachine'] . "</h3>";
$mailcontent .= "<h3>Brand:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;" . $_POST['Brand'] . "</h3>";
$mailcontent .= "<h3>Rental/Own:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['Rental/Own'] . "</h3>";
$mailcontent .= "<h3>Current Spend:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&nbsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;" . $_POST['CurrentSpend2'] . "</h3>";
$mailcontent .= "<h3>Mono(Pages)/Month:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['Mono'] . "</h3>";
$mailcontent .= "<h3>Cost/Page:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&thinsp;" . $_POST['Cost'] . "</h3>";
$mailcontent .= "<h3>Colour(Pages)/Month:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['Colour'] . "</h3>";
$mailcontent .= "<h3>Cost/Page:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['Cost1'] . "</h3>";
$mailcontent .= "<h3>Drawers:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['Drawers'] . "</h3>";
$mailcontent .="<h3>Dual Scanner:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['DualScanner'] . "</h3>";
$mailcontent .= "<h3>Fax:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['Fax'] . "</h3>";
$mailcontent .= "<h3>A3:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['A3'] . "</h3>";
$mailcontent .= "<h3>Software Integration:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['SoftwareIntegration'] . "</h3>";
$mailcontent .= "<h3>Finisher:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&emsp;&emsp;" . $_POST['Finisher'] . "</h3>";
$mailcontent .= "<h3>Looking For/Notes:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&emsp;&emsp;" . $_POST['LookingFor3'] . "</h3><br>";







$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件 
//$mailtype .= 'MIME-Version: 1.0' . "\r\n"; //设置MIME版本
//$mailtype .= "Content-type:text/html;charset=UTF-8" . "\r\n"; //设置内容类型和字符集

//PHP_EOL
//$mailtype .= "MIME-Version: 1.0/r/n"; //设置MIME版本
//$mailtype .= "Content-type: text/html; charset=iso-8859-1/r/n"; //设置内容类型和字符集


//$mailtype .= "MIME-Version: 1.0/r/n"; //设置MIME版本
//$mailtype .= "Content-type: text/html; charset=iso-8859-1/r/n"; //设置内容类型和字符集


//$mailtype = "MIME-Version: 1.0/n"; //设置MIME版本
//$mailtype .= "Content-type: text/html; charset=iso-8859-1/n";  //设置内容类型和字符集

//$mailtype .= "MIME-Version: 1.0/r/n"; //设置MIME版本
//$mailtype .= "Content-type: text/html; charset=iso-8859-1/r/n"; //设置内容类型和字符集

//$mailtype  .= 'MIME-Version: 1.0' . "\n";
//$mailtype  .= 'Content-type: text/html; charset=iso-8859-1' . "\n";

//$mailtype = 'MIME-Version: 1.0' . "\r\n";
//$mailtype .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

//$mailtype ="MIME-Version: 1.0".PHP_EOL;
//$mailtype .="Content-Type:text/html;charset=utf-8".PHP_EOL;


//************************ 配置信息 **************************** 
$smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
$smtp->debug = false;//是否显示发送的调试信息 
$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
echo "<div style='width:300px; margin:36px auto;'>";
if ($state == "") {
    echo "<h3>Sorry, the email failed to send! Please check whether the mailbox is filled in incorrectly.</h3>";
    echo "<br><a href='https://tel5.com.au/'>Return</a>";
    exit();
}
echo "<h3>Email sent successfully!</h3>";
echo "<br><a href='https://tel5.com.au/'>Return</a>";
echo "</div>";
?>
