<?php

session_start();

if($_SESSION['email_verified']=="") {

	header('location:https://www.troes.io');

	exit();

}

include('header.php'); ?>  

<div class="container">

    <div class="row">

        <div class="payment_board welcome_box email_verify_box ">

        <?php include('navbarfile.php');

          $_SESSION['email_verified'];

          //$sqlplan = "SELECT pwa_choice,energy_plan FROM `pwa_registration` WHERE pwa_email='".$_SESSION['email_verified']."' and pwa_status=0";

           $sqlplan = "SELECT pwa_choice,energy_plan FROM `pwa_registration` WHERE pwa_email='".$_SESSION['email_verified']."' and email_verified=1";

          $result = mysqli_query($con, $sqlplan);

          $result_array=mysqli_fetch_assoc($result);

          

          

         

          if($result_array['pwa_choice']=='Hill Air Force Base') {

            $prstripe_id='prod_MWRzDuxNnEi77U';

            $prstripe_id2='prod_MWT4nNyBk7RrvZ';

            $prstripe_id3='prod_MWT678dSTyD0rt';

          } elseif($result_array['pwa_choice']=='Vandenberg Space Force Base') {

            $prstripe_id='prod_MWRpo2WtycSX2i';

            $prstripe_id2='prod_MWRpdPg64vD9lT';

            $prstripe_id3='prod_MWRpz5tmh9Xbfh';

          } else {

            $prstripe_id='prod_MWRnsyF8GOst7n';

            $prstripe_id2='prod_MWRoGFnHdgHWET';

            $prstripe_id3='prod_MWRoMVq5NenPmS';

          }



        ?>

  <!-- swiper1 -->

  <div class="payment-wrapper">

  <div class="swiper-container swiper1">

      <h6>Energy Options</h6>

      <?php $sqloption = mysqli_query($con,"select * from prices where location_id='".$result_array['pwa_choice']."'");

      $sqloption_namebhi = mysqli_fetch_array(mysqli_query($con,"select * from prices where location_id='".$result_array['pwa_choice']."'"));

      ?>

        <div class="swiper-wrapper">

          <?php

          $op=1;

          while($location_value=mysqli_fetch_array($sqloption)) { ?>

            <div class="swiper-slide <?php if($op==1) { echo 'selected'; } ?> spricec" data-prid='<?php echo $location_value['id']; ?>' data-option='<?php echo $location_value['package_name'] ;?>..'><p>Option <?php echo $op;?></p><img src="https://www.troes.io/images/option<?php echo $op;?>.png" alt=""></div>

          <?php $op++; } ?>

            <!-- <div class="swiper-slide spricec" data-prid='<?php //echo $prstripe_id2; ?>' data-option='Base Package 2'><p>Option 2</p><img src="https://www.troes.io/images/option2.png" alt=""></div>

            <div class="swiper-slide spricec" data-prid='<?php //echo $prstripe_id3; ?>' data-option='Base Package 3'><p>Option 3</p><img src="https://www.troes.io/images/option3.png" alt=""></div> -->

        </div>

  </div>

  <!-- swiper2 -->

  <div class="swiper-container swiper2">

      <div class="swiper-wrapper">

          

          <?php //if($result_array['pwa_choice']=='Vandenberg Space Force Base') { ?>

          <div class="swiper-slide">

              <div class="outer_slider_border">

                <div class="inner_slider_border">



                      <div class="threeboxcnt">

                        <div><p>kWh</p><span class="pr_kwh_name"></span></div>

                        <div><p>Mi Eq</p><span class="pr_mieq_name"></span></div>

                        <div><p>$/Mi</p><span class="pr_dollarmi_name"></span></div>

                      </div>



                      <div class="centercnt">

                          <h4><?php echo $sqloption_namebhi['location'];?></h4>

                        <h3><span class="pr_orginal_name"></span></h3>

                        <!-- <h4>Base Package - 1</h4> -->

                      </div>

                      <div class="bottom-pricebox">

                        <p>Total: $<span class="pr_orginal_price"></span> / Month</p>

                        <p>Sales Tax: <span class="pr_sales_tax"></span>% </p>

                      </div>

                </div>

              </div>

          </div>

          <div class="swiper-slide">

          <div class="outer_slider_border">

                <div class="inner_slider_border">



                      <div class="threeboxcnt">

                      <div><p>kWh</p><span class="pr_kwh_name"></span></div>

                        <div><p>Mi Eq</p><span class="pr_mieq_name"></span></div>

                        <div><p>$/Mi</p><span class="pr_dollarmi_name"></span></div>

                      </div>



                      <div class="centercnt">

                          <h4><?php echo $sqloption_namebhi['location'];?></h4>

                        <h3><span class="pr_orginal_name"></span></h3>

                        <!-- <h4>Base Package - 2</h4> -->

                      </div>

                      <div class="bottom-pricebox">

                        <p>Total: $<span class="pr_orginal_price"></span> / Month</p>

                        <p>Sales Tax: <span class="pr_sales_tax"></span> </p>

                      </div>

                </div>

              </div>

          </div>

          <div class="swiper-slide">

          <div class="outer_slider_border">

                <div class="inner_slider_border">



                      <div class="threeboxcnt">

                      <div><p>kWh</p><span class="pr_kwh_name"></span></div>

                        <div><p>Mi Eq</p><span class="pr_mieq_name"></span></div>

                        <div><p>$/Mi</p><span class="pr_dollarmi_name"></span></div>

                      </div>



                      <div class="centercnt">

                          <h4><?php echo $sqloption_namebhi['location'];?></h4>

                        <h3><span class="pr_orginal_name"></span></h3>

                        <!-- <h4>Base Package - 3</h4> -->

                      </div>

                      <div class="bottom-pricebox">

                        <p>Total: $<span class="pr_orginal_price"></span> / Month</p>

                        <p>Sales Tax: <span class="pr_sales_tax"></span> </p>

                      </div>

                </div>

              </div>

          </div>

          

          </div>

         

                </div>

              







  <div class="payment-tc">

      <p>Terms of Service<p>

          <!--<span id="scroll_height">0</span>-->

<div class="payment-tc-wrap"><form>

		<div class="form-group" id="myDIV" >

			<textarea id="myDIV1" class="w-100" cols="30" rows="4" readonly>

 CUSTOMER SERVICE AGREEMENT

WE ADVISE YOU TO READ THIS AGREEMENT CAREFULLY INCLUDING THE ADDENDUMS FOUND AT THE END OF THIS

AGREEMENT APPLICABLE TO THE INDIVIDUAL SERVICES. ALL OF THESE TERMS AFFECT YOUR LEGAL RIGHTS BY,

AMONG OTHER THINGS, LIMITING TRO ENERGY SOLUTIONS� LIABILITY AND REQUIRING MANDATORY ARBITRATION OF

DISPUTES.

1. INTRODUCTION

This Residential Customer Service Agreement (�Agreement) sets forth the terms and conditions under which TRO Energy Solutions INC or one

or more of its subsidiaries or affiliates authorized by applicable regulatory, franchise or license authority (each subsidiary hereafter �TRO ES�)

agrees to provide Services (as defined below) to you, and under which you, the Customer, agree to accept the Service. In this Agreement, �you�

and �your� mean the �Customer� who subscribes to, uses, has access to or receives one or more Services or TRO ES Equipment (as defined

below). �TRO ES,� �we,� �our,� and �us� means the TRO Energy Solutions entity that is providing you with Service. TRO Energy Solutions

Services include but are not limited to residential electric vehicle charging service (�Charge Time�), community charging stations, and associated

features or applications, which may include your ability to access sites including all websites, online accounts, information portals, mobile

applications downloaded to a mobile device by which these services are accessed, are collectively referred to in this Agreement as the �Service�

or �Services.� The Services defined in this Agreement do not include other services provided by TRO Energy Solutions or its affiliates unless

specifically referenced herein, or services provided by TRO Energy Solutions to commercial customers, which may be governed by one or more

separate agreements. Subject to Section 13(F), this Agreement shall remain in effect at all times you are subscribed to and/or receive the

Service(s), to include following any changes you or TRO Energy Solutions make to the Service(s) you receive or to the TRO ES Equipment,

Customer Equipment, or other equipment (as defined in Sections 6 and 7 below) you use.

1.A. OUR AGREEMENT

You will be bound by the terms and condition in this Agreement applicable to the Services provided, including the additional terms and

conditions contained in the Addenda to this Agreement related to TRO Energy Solutions. The Services are also subject to the Annual Privacy

Notice (Customer Privacy Notice�) and as applicable and the TRO Energy Solutions Acceptable Use Policy (�AUP�). The Services provided are

subject to federal, state, and local laws, statutes, regulations, and ordinances applicable to such Service (�Applicable Law�).

1.B. ENTIRE AGREEMENT

This Agreement and all of the documents specifically incorporated herein constitute the entire Agreement between you and TROES for Services.

No prior agreement and no written or oral statement, advertisement, or Service description will contradict, explain, or supplement it.

1.C. ACCEPTANCE OF AGREEMENT

Your Agreement with TROES starts when you accept and continues until your subscription to the Services is terminated, except as otherwise

stated herein. Certain provisions of this Agreement will survive termination. You accept this Agreement when you first do any of the following

(�Acceptance�) upon or after the Effective Date of this Agreement: (i) sign this Agreement by written electronic signature, (ii) inform us

electronically or orally of your acceptance of this Agreement by requesting that TROES take steps to activate your service, (iii) activate any

Service provided under this Agreement through a method provided by TROES, or (iv) use or pay for, in whole or in part, your Service.

BY ACCEPTING THIS AGREEMENT, YOU AGREE TO ITS TERMS AND CONDITIONS AND THE RATES AND CHARGES AS

LISTED ON THE TROES WEBSITE, IN YOUR WELCOME KIT, OR ON YOU TRANSACTION SUMMARY. IF YOU DO NOT AGREE

TO THE TERMS AND CONDITIONS CONTAINED IN THIS AGREEMENT, DO NOT USE THE SERVICES AND IMMEDIATELY

TERMINATE YOUR SUBSCRIPTION TO THE SERVICES AND THE AGREEMENT BY CALLING/EMAIL TROES AT THE

CUSTOMER SERVICES NUMBER/EMAIL ON YOUR BILL.

1.D. CHANGES TO THE AGREEMENT OR SERVICES, FEATURES AND FUNCTIONALITIES OFFERED

TROES reserves the right to, without notice at any time and from time to time (including without limitation, during any term commitment to

which you have agreed), add, delete, rearrange, alter, change and/or eliminate: (i) the terms and conditions of this Agreement, (ii) any and all

prices, fees and/or charges; and/or (iii) packages, programming, programming suppliers, services offered by suppliers, software, applications,

features and/or functionalities. In the event that we add, alter and/or change any prices, fees and/or charges, then you agree to pay such added,

altered, and/or changed prices, fees and/or charges. In the event that we add, delete, rearrange, alter, change and/or eliminate any packages,

programming, programming suppliers, services offered by suppliers, software, applications, features and/or functionalities, then you acknowledge

and agree that we have no obligation to replace or supplement such packages, programming, programming suppliers, services offered by

suppliers, software, applications, features or functionalities. You further acknowledge and agree that you are not entitled to any credits, refunds,

price reductions or any other form of compensation because of any such addition, deletion, rearrangement, alteration, change and/or elimination.

You further acknowledge and agree that such additions, deletions, rearrangements, alterations, changes and/or eliminations are not a discretionary

act by TROES if they are due, in whole or in part, to the termination, suspension or expiration of TROES� legal right to provide such packages,

programming, programming suppliers, services offered by suppliers, software, applications, features or functionalities

1.E. NOTICE OF MATERIAL CHANGES

TROES will provide you with written notice of any changes that we determine are material to your Services or this Agreement consistent with

Applicable Law. You agree that we may provide you wish such written notice (i) by including the notice on or with your TROES bill, (ii) by

sending notice to your email address on TROES� account records, (iii) by hand delivery, (iv) by posting such changes on the TROES Website, or

(v) by sending it via email to the address in your customer profile, (vi) by other lawful means, and you agree that any of the foregoing will

constitute sufficient notice and you waive any claims that these forms of notice are insufficient of ineffective. All such changes will become

effective as of the date specified on the written notice and will be posted on the TROES Website and you agree to regularly check your postal

mail, e-mail and all postings on the Website or another website about which you have been notified or you bear the risk of failing to do so. The

updated version of this Agreement on the TROES Website will supersede any prior version of this Agreement. You agree that your sole recourse

if you do not accept any such material change to your Services or this Agreement is to terminate this Agreement within thirty (30) days of our

notice to you. If you receive services under a Minimum Term Agreement that requires you to pay an early termination fee and you terminate

Services subject to that Minimum Term Agreement as provided in this Agreement upon express written notice from us of a material change in



this agreement, you will not be charged an early termination fee under that Minimum Term agreement. Your continued use of the Services after

such thirty (30) day period will constitute your Acceptance of this Agreement as modified.

1.F. COPY OF AGREEMENT OR RATES

A copy of this Agreement and the rates for the Services may be obtained by visiting TRO ES website or the corporate headquarters listed on your

monthly TRO ES bill.

1.G. YOUR SUBSCRIPTION

You represent to TRO ES that you are at least 18 years old or the age of majority in your state. Your Acceptance of this Agreement entitles you to

use the Services. Your use of the Services is personal to you. If you permit other persons to use the Services, you agree that you are solely

responsible and liable for any and all breaches of this Agreement, whether such breach results from your use or use by another person using the

Services provided to you, TRO ES Equipment, or Licensed Software. You are responsible for contacting the TRO ES customer service number

listed on your monthly TRO ES bill immediately upon the occurrence of any change in the status of your account, such as, without limitation, a

change in individuals authorized to use your account (�Authorized Users�), any changes to your contact information such as name, email address,

wireline or wireless phone number, or if you move or any of your Services become subject to a bulk agreement. You agree to keep your contact

information, including email address or contact telephone number, up to date and current.

1.H. CONSENT TO CONTACT YOU

In order to contact you more efficiently, TRO ES and our affiliates may at times contact you using auto-dialer technology, prerecorded or

artificial voice message calls, or text messages at the telephone number(s) you have provided us. By providing a mobile phone number, you

confirm that you are the current owner/subscriber of the mobile phone number provided or that the current owner/subscriber of this mobile phone

number authorized you to provide this number (collectively, �Current Owner�) to TRO ES. You understand that by providing this mobile phone

number, the Current Owner consents to being contacted by TRO ES and our affiliates at the mobile number provided. You agree to notify us

immediately if there is any change in the information that you have provided to us, including without limitation any change in your telephone

number or mobile telephone number. Failure to do so is a breach of this Agreement. You agree that we and our service providers or agents may

place such calls, pre-recorded messages, or texts to communicate with you about your account and our service(s) and equipment, and minimum

term agreements, including (but not limited to): (i) providing notices related thereto, (ii) resolving technical or billing issues, (iii) informing of

installation or other service appointments, (iv) data usage, (v) investigating or preventing fraud, (vi) collecting a debt or outstanding balance, (vii)

gathering information to enhance our subscriber experience, and/or (viii) marketing our services. Also, we may share your phone number(s) with

such service providers or agents whom we hire to assist us in carrying out these communications, but we will not share your phone number(s)

with any third parties for their own purposes without your consent. Applicable standard telephone minute, data and/or text charges may apply.

Consent to marketing communications is not required in order to obtain or use TRO ES� products and services, or for any purchase, and you can

manage your communications preferences within the TRO ES Charge Time application. You agree that you shall indemnify, defend and hold us

harmless from any claim or liability resulting from your failure to notify us of a change in the information you have provided, including any

claim or liability under the Telephone Consumer Protection Act (47 U.S.C. Sec. 227), and any regulations promulgated thereunder resulting from

us attempting to contact you at the mobile telephone number you provided. Your consent to receive communications as outlined herein survives

termination of your services.

2. CHARGES, BILLING, AND PAYMENT

2.A. CHARGES, TAXES, AND FEES

2.A.1. CHARGES AND RATES

You agree to pay by the due date on your TRO ES bill all charges associated with the Services and TRO ES equipment and that you or anyone

using your account or services incurs including without limitation all recurring and non-recurring fees. Non-recurring charges may include but are

not limited to (i) installation, activation, and reactivation fees, (ii)certain equipment fees, (iii) Charge Time package price. Rates and charges may

vary depending upon the Services rendered and TRO ES may change the rates for the Services and TRO ES equipment from time to time. If you

received Service(s) under a promotion, after the promotional period ends, the then-current regular retail rate for the Service(s) will apply. The

retail rates for TRO ES� Charge Time Services and TRO ES Equipment may be found on the website and/or application, welcome email. All fees

do not apply to all Services.

2.A.2. GOVERNMENT TAXES AND FEES

You must pay all federal, state, and local taxes, franchise fees and any other fees or payment obligations imposed by government or quasi-

governmental bodies however described, levied or assessed which are applicable to the Services or TRO ES Equipment we provide you. Unless

required by Applicable Law, we may elect not to provide notice of a change in fees or taxes. You will be responsible for paying any government-

imposed Surcharges that become applicable retroactively.

2.A.3. GOVERNMENT TAXES AND FEES

You must pay all other TRO ES imposed surcharges and fees we may assess in connection with the Services or the TRO ES Equipment

(collectively �Surcharges�). These Surcharges may include, but are not limited to, federal Universal Service fees, telecommunications relay

service fees, Access Fees, subscriber line charges, network interface fees, network access charges, and any other regulatory and administrative

costs we incur to provide the Services and comply with governmental programs. These Surcharges are not government mandated fees or taxes but

are charges that are either allowed to be passed through by governmental agencies or are imposed by TRO ES in order to facilitate the provision

of the Services or the TRO ES Equipment. Certain Surcharges, may occur or fluctuate according to amounts or limits set by the government that

TRO ES may pass through to you. TRO ES may not always provide advance notice if those changes cause adjustments in the amount of the

Surcharges charged to you.

2.A.3. UNAUTHORIZED AND DISPUTED CHARGES

If you do not agree with a charge on your bill or you believe it is an unauthorized charge, you must (i) pay undisputed amounts by the due date

listed on your bill and (ii) notify TRO ES no later than sixty (60) days after the date of the bill (or such later date as required by law) of the

disputed or unauthorized charges by calling or writing to us at the number and address specified on your bill and submit any documentation or

other information to substantiate your claim of unauthorized charges. You waive any disputes or credits that you do not report within this sixty



(60)-day period. TRO ES will investigate any disputed charges and will use reasonable efforts to advise you of the results of our investigation

within thirty (30) days after TRO ES� receipt of your notice of dispute. TRO ES may, in its sole discretion, waive such charges. You will be

responsible for charges or other obligations or liabilities associated with any improper, illegal or unauthorized use of the Services, Licensed

Software and/or TRO ES Equipment as described in Section 8 below.

2.A.4. UNAUTHORIZED AND DISPUTED CHARGES

You agree to pay the repair or replacement cost plus incidental costs that TRO ES incurs for the repair or replacement of any TRO ES Equipment

that is lost, stolen, damaged, modified, sold, transferred, leased, encumbered or assigned together with any costs incurred by TRO ES in obtaining

or attempting to obtain possession of any TRO ES Equipment.

2.B. PAYMENTS AND BILLINGS

2.B.1. AUTHORIZED PAYMENT METHODS

All payments must be made in U.S. currency only and via TRO ES-authorized payment channels. TRO ES authorized payment methods include:

(i) automated electronic drafts from your checking account (ii) providing a credit or debit card payment to a TRO ES customer service

representative or Cox authorized automated payment system over the telephone; or (iii) paying by credit or debit card through the TRO ES

website and/or application. If you use a credit or debit card to pay for any charges, taxes, fees or Surcharges, you acknowledge that use of the

card is governed by the card issuer agreement, and you must refer to that agreement for your rights and liabilities as a cardholder. If TRO ES does

not receive payment from your credit card issuer or its agents, you agree to pay all amounts due upon demand.

2.B.2. BILLING AND LATE PAYMENTS

Service(s) are provided to you on a month-to-month basis. Recurring charges and taxes are due in advance once Service is initiated. Charges

accrue through a full billing period. TRO ES may prorate or adjust a bill if the billing period covers less than or more than a full month (for this

purpose, each month is considered to have 30 days); unless you subscribe to a pay-as-you-go service which is not prorated and is billed for a full

month. TRO ES will determine the billing period and may change the billing period from time to time. You may be billed for some Service(s)

individually after they have been provided to you, including without limitation measured and per-use charges, usage overage charges, and one-

time charges such as service call charges. If you fail to make full payment by the payment due date set forth on your bill statement, TRO ES

reserves all rights it may have, subject to Applicable Law, to terminate Service or place the Service(s) in Disconnection, remove TRO ES

Equipment, and/or collect the full amount due, including, without limitation, any applicable interest, costs of collection (including attorneys� fees

and third party agent collection fees), late fees (subject to state law and regulations), door collection fees, bank fees and any other applicable fees,

charges or payments. Any balance amount that remains delinquent may be referred to a third party for collections. Once the debt is referred to a

third party for collection, you may be subject to and agree to reimburse TRO ES for additional fees, including reasonable attorneys� fees, and fees

related to costs and expenses, which may be based on a percentage of up to 25% of the balance owed (subject to state law and regulations). For

past due balances assigned to a field collector for payment, a fee of up to $25.00, or up to the maximum amount allowed by law or regulation,

will be charged to your TRO ES account, regardless of how you make your payment. You may be required to pay a reactivation or reinstallation

fee and/or a deposit in addition to all past dues charges before Service may be reconnected or restored.

2.B.3. RETURNED PAYMENT

If your payment by/via credit card is denied, or your electronic funds transfer is denied for any reason, including insufficient funds, or a closed

account, you authorize TRO ES to make a one-time electronic fund transfer from your account to collect the amount of the payment plus any

applicable returned payment fees of up to $25.00 or up to the maximum amount allowed by law or regulation. When payment is made by credit

or bank card, the payment may also be subject to the terms and conditions required by the bank or credit card issuer.

2.B.4. SOFT DISCONNECTION

If your account has been delinquent or if TRO ES has a reason to believe you have otherwise violated this Agreement, including engagement in

fraudulent activity, subject to Applicable Law, you may be prevented from using certain of your Services prior to full termination of service. This

restriction will be lifted once you have made acceptable payments to us or otherwise meet TRO ES� minimum financial requirements, or you

have communicated TRO ES and resolved any concerns about your account, Services or compliance with the terms of this Agreement.

2.B.5. STORED PAYMENT METHOD

If you provide TRO ES with any account information, such as your bank account and routing numbers or your credit or debit card details, we

may store that information and use it to administer your account, confirm charges, detect and prevent fraud, verify your identity, process

payments to your account that you request in the future by telephone, mobile app, internet, or otherwise, and comply with applicable data security

protocols, including but not limited to the Payment Card Industry Data Security Standard. Additionally, TRO ES may, without prior notice to

you, use your stored account information to initiate credit or debit entries to your account as necessary to correct any mistakes or amendments in

billing, payments, or collection.

3. ACCESS TO PREMISES

3.A. ACCESS TO PREMISES

You agree to allow TRO ES and/or our agents to enter the property at which the Service(s) and/or TRO ES Equipment will be provided to you

(the �Premises�), upon your request, to install, configure, upgrade, maintain, inspect, change, repair and/or remove the Service and/or TRO ES

Equipment. You warrant that you are either the owner of the Premises or, if you are not the owner of the Premises that you have obtained the

consent of the owner for TRO ES or its agents to access the Premises for the purposes described herein including, without limitation, consent to

attach TRO ES Equipment to the Premises. If installation of Services or TRO ES Equipment by TRO ES at your Premises is required, TRO ES

will schedule one or more installation and/or service appointments with you as needed and you agree to be present or to have a responsible

representative, 18 years or older, present at the Premises during such appointments. Failure to schedule required installation of Services or TRO

ES Equipment at your Premises may result in the disconnection of Services.

3.B. SAFE WORKING ENVIRONMENT

You agree to provide TROES� employees and representatives with a safe working environment while on the Premises. If a TRO ES employee or

representative deems the working environment unsafe in his/her sole discretion, you agree that TRO ES may elect not to provide any services,



including without limitation installation, repair, maintenance, support or training services, on the Premises until such Premises are deemed safe

by TRO ES.

4. TRO ES EQUIPMENT

4.A. DEFINITION

�TRO ES Equipment� means any equipment provided or rented to you by TRO ES or our agents with or without a separate charge or fee in

connection with the Services. TRO ES Equipment also includes any software, firmware, or other programs contained within the TRO ES

Equipment and Customer Equipment. Examples of TRO ES Equipment includes but not limited to, electrical panel, electrical panel fuse, cables,

charging cables, charger head, charger body, smart panel module, cables, modems, wireless gateway/routers, converters/receivers/set top boxes,

digital adapters, remote controls, and similar equipment used to deliver the Services. TRO ES Equipment does not include equipment you may

purchase at retail or from TRO ES directly. You agree that TRO ES Equipment will remain the property of TRO ES and you will not acquire any

ownership or other interest in any TRO ES Equipment or any network facilities, cabling or software by virtue of any payment made pursuant to

this Agreement or by any attachment of the TRO ES Equipment to the Premises. You agree that TRO ES Equipment will not be deemed fixtures

or in any way part of the Premises. You agree to use TRO ES Equipment only for receiving and/or using the Service(s) pursuant to this

Agreement.

4.B. CHANGES AND UPGRADES TO TRO ES EQUIPMENT

TRO ES may upgrade, replace, remove, add or otherwise change the TRO ES Equipment at our discretion at any time any Service is active

(including Soft Disconnection) or following the termination of your Service(s). You consent to such changes including software, firmware and

other code updates or downloads, with or without notice to you, which may alter, add to, or remove features or functionalities of the TRO ES

Equipment or Service. You acknowledge and agree that our addition or removal of or change to the TRO ES Equipment may interrupt your

Service(s). TRO ES may, at its option, install new or reconditioned TRO ES Equipment, including replacing your existing TRO ES Equipment,

for which you may incur a fee. You agree that such changes may be performed within TRO ES� sole discretion at any time and in any manner. If

TRO ES requests that you replace, or offers to replace, your equipment in order to provide you with better Service or stronger security, and you

do not do so, TRO ES is not responsible for any resulting degradation of service or security vulnerabilities. If TRO ES requires that you add or

replace TRO ES Equipment, you agree to accept such replacement equipment, and if you do not do so, your Services may be disconnected.

4.C. UNAUTHORIZED USE AND PROHIBITION ON TAMPERING

You are responsible and may be liable for all TRO ES Equipment on your Premises and in your possession. You may not sell, lease, abandon, or

give away the TRO ES Equipment. You agree that you will not, and you will not permit others, including without limitation any other provider

of electric vehicle charging, to use, rearrange, disconnect, abandon, remove, relocate, repair, service, alter, modify, tamper or otherwise interfere

with the TRO ES cables, network, the Services, or any of the TRO ES Equipment including software, firmware, or code changes without TRO ES

�prior written consent, which TRO ES may withhold in its sole discretion. Such prohibition includes, without limitation, attaching or permitting

others to attach any unauthorized devices to our devices, the Services, or the TRO ES Equipment, using or permitting others to use equipment

that causes interference with equipment, or otherwise degrades our network quality or strength or creates leakage, altering device, or altering

identifying information such as serial numbers or logos. If you make or assist any person to make any unauthorized connection or modification to

TRO ES Equipment or the Service(s) or any other part of our network, we may terminate your Service(s) and recover such damages as may result

from your actions. You also agree that we may recover damages from you for tampering with any TRO ES Equipment or any other part of our

network or for receiving unauthorized Service(s). The unauthorized reception of the Service(s) may also result in criminal fines and/or

imprisonment. You agree that you will not allow anyone other than TRO ES or its agents to service the TRO ES Equipment.

4.D. HALT/CEASE USE OF EQUIPMENT

You agree that in the event you terminate or pause your Service, you will immediately halt use of TRO ES equipment and Services. You will

secure the TRO ES equipment in its fixed location and insure it is in good condition and without any encumbrances, except for ordinary wear and

tear resulting from proper use. This provision shall survive the termination or expiration of this Agreement.

4.E. RELOCATION OF TRO ES EQUIPMENT

The TRO ES Equipment may only be used in the Premises. You agree that you will not remove any TRO ES Equipment from the Premises

without TRO ES �prior consent. At your request, TRO ES may, at its discretion, relocate TRO ES Equipment for you within the Premises at your

request and at a time agreeable to you and us for an additional charge. YOU UNDERSTAND AND ACKNOWLEDGE THAT IF YOU

ATTEMPT TO INSTALL OR USE THE TRO ES EQUIPMENT OR SERVICE(S) AT A LOCATION OTHER THAN THE PREMISES, THE

SERVICE(S) MAY FAIL TO FUNCTION OR MAY FUNCTION IMPROPERLY. If you relocate to a new address, you may be charged a fee to

relocate the TRO ES Equipment.

5. CUSTOMER EQUIPMENT

5.A. DEFINITION

�Customer Equipment� means any equipment, software, hardware or services supplied by you to use in conjunction with the Services or the TRO

ES Equipment. You warrant that you are either the owner of the Customer Equipment or that you have the authority to give us access to the

Customer Equipment If you are not the owner of the Customer Equipment you are responsible for obtaining any access to the Customer

Equipment. If you are not the owner of the Customer Equipment, you are responsible for obtaining any necessary approval from the owner to

allow us and our agents access to the Customer Equipment. Customer Equipment is your sole responsibility including all costs of installation,

maintenance and repair. You agree to allow us and our agents the rights to insert cable cards and other hardware in the Customer Equipment, send

software, firmware, and/or other programs to the Customer Equipment and install, configure, maintain, inspect and upgrade the Customer

Equipment. You are responsible and liable for any degradation or any interruption of Service, damage to TRO ES Equipment, loss of data, loss of

your stored content or other consequences that you, TRO ES or any third party may suffer resulting from your use of Customer Equipment,

including any Customer Equipment to which TRO ES or its agents has sent software, firmware or other programs. TRO ES has no responsibility

or liability for any loss of stored content or any damage to Customer Equipment.

5.B. TECHNICAL REQUIREMENTS FOR CUSTOMER EQUIPMENT



All Customer Equipment must comply with TRO ES� technical requirements which we may post on the TRO ES Website and change from time

to time (�Technical Requirements�). We will not be obligated to provide Service or support where your Customer Equipment fails to conform to

TRO ES� Technical Requirements. NEITHER TRO ES NOR ANY OF ITS AFFILIATES, SUPPLIERS OR AGENTS WARRANT THAT

CUSTOMER EQUIPMENT NOT MEETING TRO ES�TECHNICAL REQUIREMENTS WILL ENABLE YOU TO SUCCESSFULLY

INSTALL, ACCESS, OPERATE, OR USE THE SERVICE(S). YOU ACKNOWLEDGE THAT ANY SUCH INSTALLATION, ACCESS,

OPERATION, OR USE COULD CAUSE CUSTOMER EQUIPMENT TO FAIL TO OPERATE OR CAUSE DAMAGE TO CUSTOMER

EQUIPMENT, YOU, YOUR PREMISES OR TRO ES EQUIPMENT. NEITHER TRO ES NOR ANY OF ITS AFFILIATES, SUPPLIERS OR

AGENTS SHALL HAVE ANY LIABILITY WHATSOEVER FOR ANY SUCH FAILURE OR DAMAGE. TRO ES reserves the right to deny

you customer support for the Service(s) and/or terminate Service(s) if you use Customer Equipment not meeting the Technical Requirements.

5.C. CHANGES AND UPGRADES TO CUSTOMER EQUIPMENT

You acknowledge that TRO ES may install updates and other Licensed Software and may send firmware and other code updates or downloads to

Customer Equipment which will ensure full functionality of the Service and may alter, add to, or remove features or functionalities of Customer

Equipment with or without notice to you and you agree that such changes may be performed at any time and in any manner. Periodically you

may need to acquire new or additional Customer Equipment to continue to use the Service or receive the best quality of Service.

6. POWER SUPPLY, INTERRUPTIONS, AND EMERGENCY SERVICES

6.A. POWER SUPPLY

Except as may be otherwise described in the TRO ES Addendum, the Services do not have their own power supply and property owner(s) are

required to provide power for your use of the Service. TRO ES will not be liable for any interruption of Service or other damage resulting from a

power outage disruption or fluctuation (such as a power surge). The Services are not intended to be used for activities requiring absolute

reliability and accuracy. You assume complete responsibility for any damages or injuries resulting from any interruption or other failure of the

Services due in whole or in part to a failure of power supply.

6.B. SCHEDULED INTERRUPTIONS

TRO ES may schedule and interrupt Service for maintenance, repairs, upgrades, testing, or other administrative purposes at any time except as

limited by any Applicable Law or tariff.

7. SOFTWARE AND INTELLECTUAL PROPERTY

7.A. LICENSED SOFTWARE

TRO ES grants you a limited, nonexclusive, nontransferable and non-assignable license to install and use TRO ES� software which includes

software from third party licensors (�Licensed Software�) solely in order for you to access and use the Services. TRO ES may modify the

Licensed Software at any time, for any reason, and without providing notice of any such modification to you. The Licensed Software constitutes

confidential and proprietary information and contains trade secrets and intellectual property of TRO ES and its licensors which is protected under

Applicable Law. All right, title, and interest in and to the Licensed Software will remain with TRO ES and its licensors. You agree not to

translate, decompile, reverse engineer, distribute, remarket, or otherwise dispose of the Licensed Software or any part thereof. You have a license

to use the TRO ES Equipment, content, Service, Licensed Software and/or applications provided by TRO ES and/or third-party providers

(collectively �Suppliers�). You agree, however, that all such content and Licensed Software will remain the sole property of TRO ES or its

Suppliers and that no additional rights arise from this grant of use. By subscribing to Services, you waive any claim against TRO ES or its

Suppliers in connection with this Agreement and agree that TRO ES and its Suppliers have the right to enforce this provision. You acknowledge

and agree that neither TRO ES nor its Suppliers can provide uninterrupted or error-free service and that TRO ES� and its Supplier�s liability is

limited as described in Section 11 below. You also agree to comply with the terms and conditions of all end user software license agreements

provided to you in order for you access and to use the Services. Your right to use the Licensed Software, Service, or content ends upon

termination of this Agreement.

7.B. POSTING YOUR MATERIAL

You are solely responsible and liable for all material that you upload, post, email, transmit or otherwise make available via the Services,

including, without limitation, material that you post to any TRO ES website, third-party website, or any third-party vendor�s service (such as a

social media site) that is used by TRO ES. TRO ES does not claim ownership of material you submit or make available for inclusion on the

Service. However, with respect to material you submit or make available for inclusion on publicly accessible areas of the Service, you grant TRO

ES a world-wide, royalty free and non-exclusive license to use your material in connection with TRO ES businesses including, but not limited to,

the rights to copy, distribute, publicly perform, publicly display, transmit, publish your name or identifier in connection with the material, and to

prepare derivative works. No compensation will be paid with respect to the use of your material.

7.C. COPYRIGHT AND TRADEMARK NOTICES

Materials available on TRO ES Websites and on other Services are protected by copyright law. TRO ES is a trademark of TRO Energy Solutions,

Inc. TRO ES and other TRO ES services referenced herein are either actual service marks or registered service marks of TRO Energy Solutions,

Inc. All other trademarks and service marks are the property of their respective owners.

7.D. CUSTOMER PRIVACY NOTICE

TRO ES will provide you with its Customer Privacy Notice upon obtaining Service and again annually, but the most up-to-date version is always

online at the TRO ES Website. The Customer Privacy Notice describes how TRO ES may from time to time collect, use, and disclose

information about you and includes information as to your choices concerning usages, Customer Proprietary Information, use of cookies, use of

location information, and other policies and rights concerning your use of TRO ES Services. Changes in our Services or the law may cause us to

make changes to our Customer Privacy Notice from time to time. We will post any changes at the Website, along with the effective date of the

changes. TRO ES also has the right to intercept and disclose any transmissions over our facilities in order to protect our rights or property, to

comply with the law, pursuant to a court order or subpoena or where we believe individual or public safety is in peril.

7.E. SECURITY OF YOUR ACCOUNT



You are responsible for protecting the information required to access or make modifications to your account (for example, passwords, PINs,

secret answers to security questions, etc.). If someone else acquires this information (through no fault of ours), we will presume that you have

authorized that person�s use of the information and access to your account, including any charges related to account transactions, added services,

the purchase of content, and/or access to programming, for which you will be billed. Please report any suspected incidents of unauthorized access

to your account or unauthorized disclosure of your account information to TRO ES promptly by emailing TRO ES at charge@troenergy.io,

address listed on your bill statement, or writing to us at the address listed on your bill statement. In the event TRO ES observes or suspects

fraudulent activity, we may suspend all or partial access to your account and services pursuant to our security policies to prevent unauthorized

access, and we may further require you to enroll in additional authentication methods, such as two-factor authentication, to maintain account

security.

8. USE OF SERVICE

8.A. COMPLIANCE WITH THE LAW

You agree that you will comply with all current and future laws regarding the Services. If you violate the law in connection with your use of the

Services, TRO ES Equipment, or Licensed Software, TRO ES may suffer harm and will have all remedies available at law or in equity, including

injunctive relief. Content derived from the Service, TRO ES Equipment, the Licensed Software, and any accompanying information is subject to

applicable export control laws and regulations of the United States. You agree not to export or re-export such content, to any countries that are

subject to restrictions or upload through the Services any material in violation of such restrictions.

8.B. NON-COMMERCIAL USE ONLY

You agree to use the Services only for personal, noncommercial purposes and not business activities. You may not resell, redistribute, or

otherwise commercialize Services unless you obtain and pay for any applicable public performance licenses.

8.C. MISUSE OF THE SERVICE

You agree to not misuse the Services, TRO ES Equipment, or Licensed Software. Such misuse includes but is not limited to: (i) violation of

Applicable Law and any commercial use as described above; (ii) use in a manner that adversely interferes with TRO ES� network or reputation;

(iii) any unauthorized or fraudulent use of or access to the Services such as to avoid paying for Services; (iv) use in a manner that infringes the

intellectual property or other rights of any third party including copying, modifying, reverse engineering, uploading, downloading or reselling any

content or Licensed Software; (v) sending content or messages or otherwise engaging in communications that are abusive, obscene, lewd,

lascivious, filthy, excessively violent, harassing, illegal, fraudulent, threatening, defamatory or an invasion of privacy; (vi) modifying or

tampering with TRO ES Equipment in any manner other than as expressly authorized by TRO ES; (vii) engaging in telemarketing, fax

broadcasting, spam, junk or other unsolicited email; (viii) intercepting a third party�s communications or accessing or attempting to access

another party�s account or otherwise circumvent any security measures;(ix) uploading any virus, worm or malicious code; (x) using automated

connections that allow web broadcasts, automatic data feeds, automated machine-to-machine connections or peer-to-peer file sharing; (xi) using

as a substitute or back-up for private lines, or full-time or dedicated data connections; (xii) networking hacking and �denial of service� attacks;

(xiii) using unauthorized software or devices to maintain continuous active Internet connection when the connection would otherwise have

entered idle mode; or, (xiv) engaging in continuous or extensive call forwarding or long distance abuse. In addition, you agree not to use the

Service in a manner that infringes the copyright, trademark or other rights of any third party. TRO ES assumes no responsibility, and you assume

all risk regarding the determination of whether material is in the public domain or may otherwise be used by you for any purpose. In the event

TRO ES receives a claim of infringement from a copyright owner, TRO ES may forward one or more such notices directly to you. TRO ES may

suspend and, in appropriate circumstances, terminate any repeat copyright infringer.

8.D. CUSTOMER RESPONSIBILITIES FOR IMPROPER USE

You acknowledge that you are accepting this Agreement on behalf of all persons who use the Service(s) and TRO ES Equipment at the Premises

and that you shall have the responsibility for ensuring that all other users understand and comply with the terms and conditions of this Agreement

and any applicable policies, including, but not limited to the TRO ES Internet Acceptable Use Policy, Customer Privacy Notice, and any other

applicable privacy notices or other policies. You will take reasonable precautions to prevent others from gaining unauthorized access to the

Services. Except as otherwise specified in this Agreement, you are responsible for any unauthorized use and for controlling access to the

Services, TRO ES Equipment, Customer Equipment, and Licensed Software including payment of any charges incurred as a result of any such

unauthorized use.

8.E. MONITORING COMPLIANCE WITH THE LAW AND THIS AGREEMENT

Although TRO ES is not obligated to monitor the Services, TRO ES may perform tests and inspections to confirm that you are complying with

this Agreement. TRO ES may, without notice, suspend, restrict access to or terminate your Service, or remove or make unavailable any content

and/or monitor, review, retain and/or disclose any content or other information in TRO ES� possession about or related to you or your use of the

Services as TRO ES deems necessary to satisfy any Applicable Law, regulation, legal process or governmental request.

8.F. THEFT OF SERVICE

Tampering with or altering a charging system, device, smart fuse, panel or additional hardware to receive unauthorized services is a Federal crime

punishable by fines and/or imprisonment. We may conduct periodic system checks and audits to detect the unauthorized receipt of Service.

8.G. CALL RECODING USE OF RECORDING DEVICES

You consent to TRO ES recording phone conversations between you and TRO ES for quality assurance, analytics and internal business purposes.

Your use of recording devices to record telephone conversations transmitted over the Services is at your own risk provided that your use complies

with all federal, state and local laws, regulations, rules and ordinances.

9. INDEMNIFICATION

You hereby indemnify and hold harmless TRO ES and its parent companies, subsidiaries, affiliates, Suppliers and other suppliers, contractors,

distributors, licensors and business partners, as well as the officers, directors, employees, agents and representatives of each of these (each a

�TRO ES Related Party�, and collectively, the �TRO ES Related Parties�) from any third-party claims, actions, proceedings, damages and

liabilities, including attorneys� fees, arising out of (i) your use, or other users� use, of your Services or TRO ES Equipment; (ii) any act in



violation of any law committed by you including any use of the Services that may infringe on the patent, copyright, trademark or other

intellectual property right or privacy right of any third party; (iii) any breach by you of this Agreement; (iv) any content or software displayed,

distributed, or otherwise disseminated by you or other users of your Services; (v) your failure to safeguard your PIN, passwords or other account

information, and (vi) your failure to replace Equipment when requested by TRO ES. This Section will continue in effect after this Agreement

terminates.

10. DISCLAIMER OF WARRANTIES

You acknowledge that the services, TRO ES equipment, and licensed software are provided �as is� and without warranties. TRO ES makes no

warranties, expressed or implied, including, without limitation, any warranty of merchantability or fitness for a particular purpose, of title or non-

infringement as to the services, TRO ES equipment, and/or the licensed software provided to you. TRO ES does not manufacture the TRO ES

equipment, devices or licensed software and is not responsible for any acts or omissions on the part of any manufacturer, specifically including a

manufacturer or customer equipment over which you receive the services. Unless otherwise restricted or prohibited by applicable law TROES

does not warrant that the services, TRO ES equipment or licensed software will be accurate, complete, error-free, without interruption, free from

viruses or other malicious agents even if anti-virus mechanisms are deployed. TRO ES does not warrant that any communication will be

transmitted uncorrupted or at any upstream or downstream speed. Some states do not allow the exclusion or limitation of implied warranties, so

those provisions may not apply to you. This section will continue in effect after this agreement terminates.

11. LIMITATION OF LIABILITY

THIS SECTION DESCRIBES THE FULL EXTENT OF TRO ES AND THE TRO ES RELATED PARTIES� RESPONSIBILITY FOR ANY

CLAIMS FOR DAMAGES CAUSED BY OUR ACTS OR OMISSIONS OR THE FAILURE OF THE SERVICES, TRO ES EQUIPMENT, OR

LICENSED SOFTWARE, OR ANY OTHER CLAIMS IN CONNECTION WITH THE SERVICES, TRO ES EQUIPMENT, LICENSED

SOFTWARE, OR THIS AGREEMENT. THIS SECTION WILL CONTINUE IN EFFECT AFTER THIS AGREEMENT TERMINATES.

11.A. LIMITATION

Neither TRO ES nor any of the TRO ES Related Parties will be liable for damages for failure to furnish or the degradation or interruption of any

Services, for a problem with the interconnection of Services, for any loss of data or stored content, for identity theft, or for any files or software

damage, regardless of cause, or for a problem with the service or equipment of a third party.

11.B. DAMAGE TO PERSON OR PROPERTY

Neither TRO ES nor any of the TRO ES Related Parties will be liable for damage to property or for injury to any person arising from the

installation, maintenance or removal of TRO ES Equipment, Licensed Software, from use of Services or any content contained therein including

interactive or 3D, charging Services, from support for the Services, or from inclusion, omission, or error relating to information about you in any

published or electronic directory we may offer. You recognize that you have an obligation to exercise caution and personal responsibility

including adhering to all manufacturers� warranties accompanying any Cox or Customer Equipment or any other equipment used in connection

with the Services and to make sure that your use of the Services and Cox Equipment does not subject you or others to danger.

11.C. MONITORING

Neither TRO ES nor any of the TRO ES Related Parties is obligated to monitor your use of the Services.

11.D. NO INDIRECT OR CONSEQUENTIAL DAMAGES

YOU AGREE THAT FOR ANY CLAIMS YOU ASSERT AGAINST TRO ES OR THE TRO ES RELATED PARTIES AND FOR ANY

CLAIMS THAT TRO ES OR THE TRO ES RELATED PARTIES ASSERT AGAINST YOU, THERE SHALL BE NO LIABILITY FOR

INDIRECT OR CONSEQUENTIAL DAMAGES, INCLUDING BUT NOT LIMITED TO, LOST PROFITS OR REVENUE OR INCREASED

COSTS OF OPERATION, OR FOR PUNITIVE DAMAGES, RELIANCE DAMAGES, OR SPECIAL DAMAGES. THESE LIMITATIONS

APPLY EVEN IF THE DAMAGES WERE FORESEEABLE OR WE WERE TOLD THEY WERE POSSIBLE, AND THEY APPLY

WHETHER THE CLAIM IS BASED ON CONTRACT, TORT, STATUTE, FRAUD, MISREPRESENTATION, OR ANY OTHER LEGAL

OR EQUITABLE THEORY.

11.E. LIMITATIONS PERIOD

We each agree that any Claims must be brought within two (2) years of their accrual notwithstanding any otherwise applicable statute of

limitations.

12. TERMINATION

12.A. TERMINATION

Unless you have entered into a Minimum Term Agreement and unless prohibited by Applicable Law, either you or TRO ES may terminate this

Agreement at any time without cause by providing the other party with no less than twenty-four (24) hours written notice of such termination.

TRO ES may also terminate Service without notice to you if you fail to pay for Service or otherwise breach this Agreement, if you violate the law

or TRO ES policies, or if you misuse and/or abuse the Services, the TRO ES network, or TRO ES Equipment. You may terminate any particular

Service and this Agreement will remain in effect for any Services or TRO ES Equipment you continue to subscribe to, use, pay for or retain. In

the event of termination by you, you must notify TRO ES as instructed in Section 13(D). In the event of termination by TRO ES, TRO ES may

notify you of such termination by electronic or other means.

12.B. CUSTOMER OBLIGATIONS UPON TERMINATION

You expressly agree that upon termination of this Agreement: (i) You will either return TRO ES Equipment to TRO ES or permit TRO ES to

access your Premises at a reasonable time to remove any TRO ES Equipment and other material provided by TRO ES; (ii) You will ensure the

immediate return to TRO ES of any TRO ES Equipment in good condition without any encumbrances, except for ordinary wear and tear, or you

agree to pay TRO ES� reasonable estimates of the repair, replacement and/or incidental costs that TRO ES incurs as set forth in this Agreement;

(iii) You will return or destroy all copies of any Licensed Software provided to you pursuant to this Agreement; (iv) You are responsible for

storing or retrieving any emails, voice mail messages, and material stored in Cox�s online backup service, or other information you wish to retain

after termination of the Service; (v) You will cease use of any Services terminated; (vi) TRO ES is authorized to delete any files, programs, data



and email messages associated with any terminated account. In the event that TRO ES does not remove charging hardware from the residence

you are to refrain from using the device, store it, and otherwise maintain it in good condition. You agree to pay TRO ES� reasonable estimates of

the repair, replacement and/or incidental costs that is incurred while Service contract has been terminated but hardware was/is damaged.

12.C. PRORATION OF CHARGES UPON TERMINATION

If Services are terminated, charges will accrue through the date that TRO ES fully processes the termination. You agree to pay TRO ES on a pro-

rated basis for any use by you of any TRO ES Equipment or Services for a part of a month. You must pay all outstanding charges, including

payment of any bills that remain due. You must reimburse TRO ES for any reasonable costs we incur; including attorneys� fees, to collect

charges owed to us. If you want us to renew the Services after termination, we may require that you pay a deposit. For some Services, TRO ES

may require a minimum thirty (30) day charge regardless of the activation or cancellation date.

12.D. REFUND UPON TERMINATION

If you terminate Service, TRO ES will refund the prorated unused portion of any fees and charges you have paid in advance in accordance with

TRO ES standard practices (which may include, without limitation, paper check or electronic transfer of funds). If the pro-rata unused portion is

less than $5.00 TRO ES will make the refund on your request.

13. MISCELLANEOUS

13.A. ASSIGNMENT

Except as described in this Agreement, you may not assign or transfer any part of this Agreement or the Service(s), TRO ES Equipment or

Licensed Software (including transfer to any other occupant of the Premises or to any other location) without the prior written consent of TRO

ES. TRO ES may assign all or part of this Agreement without notice to you and without your consent.

13.B. FORCE MAJEURE

TRO ES will not be liable for any delay, interruption of Service, failure of performance of TRO ES or Customer Equipment or TRO ES�

network, or any loss, liability or damage directly or indirectly caused by circumstances beyond our control, including but not limited to acts of

God, flood, explosion, wildfire, epidemic, pandemic, public health crisis, or other catastrophes, causes attributable to you, Your Equipment or

your property, acts of third parties, national emergencies, acts of terrorism, insurrections, riots, wars, unavailability of rights-of-way, loss of use

of poles or other utility facilities, material shortages, power outages or reductions, failure of any cable signal at the transmitter, failure of a

satellite, strikes, lockouts, or work stoppages, or any law, order, regulation, or request of the federal, state or local governments having

jurisdiction over TRO ES. The use and restoration of Services in emergencies will in all cases be subject to the priority system specified by

federal regulations.

13.C. GOVERNING LAW

This Agreement will be governed by the laws of the state in which you receive the Services and applicable federal law.

13.D. NOTICES

When this Agreement requires notice from you to TRO ES, you agree to provide us with written notice to the address specified on your bill or as

instructed on the Website or by calling us. Notice by calling us will be effective as of the date our records show that we received your call.

Notices to you shall be provided as stated in Section 1(F) above.

13.E. SEVERABILITY

In the event that any portion of this Agreement is held to be unenforceable in a jurisdiction, the unenforceable portion will be construed in

accordance with Applicable Law in that particular jurisdiction as nearly as possible to reflect the original intentions of the parties and the

remainder of this Agreement will remain in full force and effect.

13.F. SURVIVING OBLIGATIONS

Certain provisions will survive the termination of this Agreement including Arbitration, Indemnification by Customer, Disclaimer of Warranties,

Limitation of Liability, Payment Obligations and all other provisions which by their nature would be expected to survive.

13.G. WAIVER AND STRICT PERFORMANCE

TRO ES� failure to require your strict performance of any term of this agreement will not be a waiver of TRO ES� right to require strict

performance of any term or condition herein.

13.H. HOW TO CONTACT US

For any questions regarding this Agreement, billing, your Services, technical support or other, please contact TRO ES by email at the address on

your bill, or charge@troenergy.io.



			</textarea>

		</div>

		

		

	</form>



</div>

        </div>

        <div class="col-md-12">

        <div class="col-md-7">

        <div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" disabled>

  <label class="form-check-label" for="inlineCheckbox1"> Scroll to bottom of Tos and click to Pay</label>

</div></div>

<div class="col-md-5">

<?php $sqloption_hidden = mysqli_fetch_array(mysqli_query($con,"select * from prices where location_id='".$result_array['pwa_choice']."'")); ?>

<form name="pwapaymentform" method="post" enctype="multipart/form-data" action="pwa_payment.php">

<input type="hidden" name="pwa_price" id="selected_planprice" value="">

<input type="hidden" name="pwa_price_new" id="prorginalpr2" value="">

<input type="hidden" name="pwa_option" id="selected_planoption" value="">

<input type="hidden" name="pwa_option_account" id="selected_planoption_account" value="<?php echo $sqloption_hidden['package_name']; ?>">

<input type="submit" disabled="disabled" class="pwa_createbtn" id="sub1" value="Pay Now" name="pwa_createbtn">





<input type="hidden" name="current_engergy_plan" id="current_engergy_plan"  value="<?php echo $result_array['energy_plan']; ?>"/>

                    

                  </form></div></div>

    </div>

</div>

</div>



<input type="hidden" id="user_planchoice" name="user_planchoice" value="<?php echo $sqloption_hidden['id']; ?>">

<script>







$(function() {

  

  $("form").submit(function(){



      if($("#current_engergy_plan").val()==$("#selected_planoption").val())

        {  

            alert("This Package is already Purchased!! For upgrading your plan, Please select another Package!");

            return false;

        }

      

        

  });

  

  

    // $(".spricec").click(function(){

    //     var price=jQuery(this).attr('data-price');

    //     var option=jQuery(this).attr('data-option');

         

    //       jQuery("#selected_planoption").val(option);

    //       jQuery("#selected_planprice").val(price);

    //       jQuery("#selected_planoption_account").val(option);

            

            

    // });

    

    $( "#myDIV1" ).scroll(function() {

          var scroll = $(this).scrollTop();

         console.log(scroll);

         // $( "#scroll_height" ).text(scroll);

          var isMobile = {

    Android: function() {

        return navigator.userAgent.match(/Android/i);

    },

    BlackBerry: function() {

        return navigator.userAgent.match(/BlackBerry/i);

    },

    iOS: function() {

        return navigator.userAgent.match(/iPhone|iPad|iPod/i);

    },

    Opera: function() {

        return navigator.userAgent.match(/Opera Mini/i);

    },

    Windows: function() {

        return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);

    },

    any: function() {

        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());

    }

};

  

      

         if(isMobile.any())

         {

              if(scroll>20000)

                $('#inlineCheckbox1').removeAttr('disabled');

         }

         else

         {

               if(scroll>29200)

               {

           

               $('#inlineCheckbox1').removeAttr('disabled');

                }   

         }

         

       

          

       });

    $('#inlineCheckbox1').click(function() {

        if ($(this).is(':checked')) {

            $('#sub1').removeAttr('disabled');

        } else {

            $('#sub1').attr('disabled', 'disabled');

        }

    });

});

</script>     

<script>









  $(function() {

       

    //   setTimeout(function(){  $(".swiper-slide.selected").trigger('click'); }, 1000);

  

  function setCurrentSlide(ele,index){

    $(".swiper1 .swiper-slide").removeClass("selected");

    ele.addClass("selected");

    // swiper1.initialSlide=index;

  }

  



   var swiper1 = new Swiper('.swiper1', {

         slidesPerView: 3,

         paginationClickable: true,

         spaceBetween: 10,



         freeMode: true,

         loop: false,

         onTab:function(swiper){

           var n = swiper1.clickedIndex;

         }

     });

  swiper1.slides.each(function(index,val){

    var ele=$(this);

    ele.on("click",function(){

     

      setCurrentSlide(ele,index);

       swiper2.slideTo(index, 500, false);

    //   mySwiper.initialSlide=index;

    });

  });
  

  

  

var swiper2 = new Swiper ('.swiper2', {

    slidesPerView: 1,

    direction: 'horizontal',

    loop: false,

    autoHeight: true,

    onSlideChangeEnd: function(swiper){

    

      var n=swiper.activeIndex;

      setCurrentSlide($(".swiper1 .swiper-slide").eq(n),n);

      swiper1.slideTo(n, 500, false);

    }

  });



  var Data="";

	$(".start").on('click',function(){

		$(".show").html('');

		var flag = true,j = 0;

			//if(flag){

				//flag = false;

				(function Data(){

					if(j < Data.length){

						setTimeout(function(){

							$(".show").html(Data.slice(0,j++));

							Data();

						},200);

					}

					else{

						$(".show").html(Data);

						flag = true;

					}

				})();

			//}

	});
	

  

  

});

</script>

<!--<script>-->

<!--    $(document).ready(function(){-->

<!--  $('.swiper1 .swiper-slide').click(function(){-->

<!--    $('.swiper1 .swiper-slide').removeClass('selected');-->

<!--    $(this).addClass('selected');-->

<!--    $('.swiper1 .swiper-slide img').attr('src', 'https://www.troes.io/images/cstransparent.png');-->

<!--    $('.selected img').attr('src', 'https://www.troes.io/images/charging-station.png');-->

     

<!--    })-->

<!--  })-->

<!--</script>-->

<?php



$check=1;

include('footer.php'); ?>

