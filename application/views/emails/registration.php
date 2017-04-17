<!DOCTYPE html>
<html>
    <head>
        <title>OnePuhunan Service Portal</title>
        <style>
            body {
                padding: 10px;
            }
            p, #table-details, #table-sig {
                font-family: Cambria, Cochin, serif;
                font-size: 14px;
                text-align: justify;
            }
            #table-details td {
                padding: 5px 20px;
            }
            #table-sig p {
                margin-top: -10px;
                margin-left: 10px;
                font-size: 12px;
            }
            #table-sig td {
                padding: 5px 15px 0;
                margin-bottom: -10px;
            }
            a {
                text-decoration: none;
            }
            .sig {
                border-left: solid rgb(47, 79, 117);
                border-width: 2px;
            }
            .sig > p {
                margin-bottom: -10px;
            }
        </style>
    </head>
    <body>
        <p>
            <b>Dear <?php echo $name ?></b>,
            <br><br><br>
            Thank you for registering at <b>OnePuhunan Service Portal</b>. 
            <br><br>
            Your registration request has been received and will be reviewed and processed 
            by the System Administrator. Your Employee ID is shown below. You will
            need this, along with the password you chose, every time you enter <b>OnePuhunan Service Portal</b>.
            An email will be sent to the email address you specified confirming your registration.
            <br>
        <p>
            
        <table id="table-details">
            <tr>
                <td>Employee ID</td>
                <td><?php echo $emp_id ?></td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td><?php echo $name ?></td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td><?php echo $email ?></td>
            </tr>
        </table>
        
        <p>
            For more details, please send an email to <a href="mailto:it@onepuhunan.com.ph?">it@onepuhunan.com.ph</a>.
            <br><br>
            This is an automated message. Please do not reply to it. 
            <br><br><br>
            Best Regards,
        </p>
        
        <br><br>
               
        <table id="table-sig">
            <tr>
                <td>
                    <img src="<?=base_url()?>img/onepuhunan.png" width="161" height="70">
                </td>
                <td class="sig">
                    <p>
                        <b>IT System Administrator</b><br>
                        Information Technology Department
                        <br><br>
                        <b>MicroVentures Philippines Financing Company, Inc.</b><br>
                        Unit 2906, One San Miguel Avenue Office Condominium <br>
                        San Miguel Avenue cor.,  Shaw Blvd., Brgy. San Antonio <br> 
                        Ortigas Center, Pasig City, Philippines, 1600 <br>
                        <a href="www.onepuhunan.com.ph">www.onepuhunan.com.ph</a> 
                    </p>
                </td>
            </tr>
        </table>
        
    </body>
</html>
