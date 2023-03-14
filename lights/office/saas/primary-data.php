<?php

use App\Models\Post;
use App\Models\SubscriptionPlan;
use App\Models\Workspace;
use Illuminate\Support\Str;

function office_create_saas_primary_data($user)
{

    ## No translation needed

    $workspace = new Workspace();
    $workspace->uuid = Str::uuid();
    $workspace->name = 'Admin Workspace';
    $workspace->is_on_free_trial = false;
    $workspace->is_active = true;
    $workspace->owner_id = $user->id;
    $workspace->save();

    $post = new Post();
    $post->uuid = Str::uuid();
    $post->workspace_id = $workspace->id;
    $post->type = 'page';
    $post->title = __('Welcome to Office Saas');
    $post->slug = 'home';
    $post->is_home_page = true;

    $post->settings = [
        'hero_section_name' => __('Hero Section'),
        'hero_title' => __('The Office Suite on the Cloud'),
        'hero_subtitle' => __('A powerful office suite on the cloud featuring writer, spreadsheet, images, file sharing, and more. No software to install. Get started for free now.'),
        'hero_image' => 'media/sample-image-saas.jpg',
        'hero_button_text' => __('Get Started'),
        'hero_button_url' => '#signup',
        'signup_section_name' => __('Sign Up'),
        'signup_title' => __('Get Started with a Free Trial'),
        'signup_subtitle' => __('Get Started with CloudOffice for Free'),
        'signup_reasons' => [
            __('Works everywhere, whether on a PC, tablet, or mobile device.'),
            __('Share with a unique access URL with access log data, and No signup is required to access the shared documents.'),
            __('Cloud Image Editor to crop, resize, and add text to images.'),
            __('No software to install. No updates to install. No hassle.'),
            __('No credit card required. No commitment. Cancel anytime.'),
        ],
        'feature_highlight_section_name' => __('Why CloudOffice?'),
        'feature_highlight_title' => __('CloudOffice is made with you in mind!'),
        'feature_highlight_subtitle' => __('Works everywhere, whether on a PC, tablet, or mobile device.'),
        'feature_highlight_feature_1_title' => __('Student'),
        'feature_highlight_feature_1_subtitle' => __('Take study notes. Share with classmates. Export as PDF. '),
        'feature_highlight_feature_1_icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
</svg>
',
        'feature_highlight_feature_2_title' => __('Teacher'),
        'feature_highlight_feature_2_subtitle' => __('Create documents. Share with colleagues. Export as PDF. '),
        'feature_highlight_feature_2_icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
</svg>
',
        'feature_highlight_feature_3_title' => __('Personal'),
        'feature_highlight_feature_3_subtitle' => __('Create documents. Share with colleagues. Export as PDF. '),
        'feature_highlight_feature_3_icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
</svg>
',
        'feature_highlight_feature_4_title' => __('Business'),
        'feature_highlight_feature_4_subtitle' => __('Create documents. Share with colleagues. Export as PDF. '),
        'feature_highlight_feature_4_icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
</svg>
',
        'about_section_name' => __('About'),
        'about_section_title' => __('More than just Office Suite'),
        'about_section_subtitle' => __('CloudOffice is a simple, lightweight office suite on the Cloud. Create, Edit, and Share to improve your work efficiency: share files, texts, links, and more with access logs. Know who is viewing and from which device and IP. Export to PDF and more.'),
        'about_section_image' => 'media/sample-image-saas.jpg',
        'pricing_section_name' => __('Pricing'),
        'pricing_section_title' => __('Pricing'),
        'pricing_section_subtitle' => __('Choose which suite is right for you'),
        'faq_section_name' => __('FAQ'),
        'faq_section_title' => __('Frequently Asked Questions'),
        'faq_section_subtitle' => __('Your questions answered'),
        'faq_questions' => [
            __('What is the difference between the monthly and yearly plans?'),
            __('How do I cancel my subscription?'),
            __('What happens if I cancel my subscription?'),
            __('How do I start a trial?'),
        ],
        'faq_answers' => [
            __('The monthly plan is billed monthly and the yearly plan is billed yearly. The yearly plan is 10% off the monthly price.'),
            __('You can cancel your subscription at any time. If you cancel your subscription, you will continue to have access to your account until the end of your current billing period.'),
            __('If you cancel your subscription, you will continue to have access to your account until the end of your current billing period. You will not be billed again after your current billing period ends.'),
            __('You can start a trial by clicking the "Get Started" or the "Sign Up" button on the pricing page. You do not need a credit card to start a trial.'),
        ],
        'testimonials_section_name' => __('Testimonials'),
        'testimonials_section_title' => __('Testimonials'),
        'testimonials_section_subtitle' => __('What our customers say'),
        'testimonials' => [
            __('It works well and has all the functions I need. I would recommend it to anyone who needs a simple and easy to use document editor.'),
            __('I love this product! This is efficient and productive. I can create documents and share them with my colleagues. I can also export them as PDF.'),
            __('I use this product to share assignments with my students. It is very easy to use and I can see the logs who accessed them.'),
        ],
        'testimonials_author' => [
            __('Emil S'),
            __('Oliver K'),
            __('William H'),
        ],
        'testimonials_author_title' => [
            __('Student, UT'),
            __('Content Writer, Ray Media'),
            __('Teacher, UT'),
        ],
        'footer_business_short_description' => 'CloudOffice improves individual and business productivity. It lets you create and share files, texts, spreadsheets, and more.',
    ];

    $post->save();

    $post = new Post();
    $post->uuid = Str::uuid();
    $post->workspace_id = $workspace->id;
    $post->type = 'page';
    $post->title = __('Privacy Policy');
    $post->slug = 'privacy-policy';
    $post->api_name = 'privacy_policy';
    $post->content = '<h2 style="text-align:center; font-weight:bold;">PRIVACY NOTICE</h2>
<p>
  <br>
  <strong>Last updated February 11, 2023</strong>
</p>
<p>This privacy notice for CloudOnex ("Company," "we," "us," or "our"), describes how and why we might collect, store, use, and/or share ("process") your information when you use our services ("Services"), such as when you: <br>Visit our website at <a href="https://www.cloudonex.com">https://www.cloudonex.com</a>, or any website of ours that links to this privacy notice </p>
<p>Engage with us in other related ways, including any sales, marketing, or events <br>Questions or concerns?&nbsp;Reading this privacy notice will help you understand your privacy rights and choices. If you do not agree with our policies and practices, please do not use our Services. If you still have any questions or concerns, please contact us at __________. </p>
<p>&nbsp;</p>
<p>
  <br>SUMMARY OF KEY POINTS
</p>
<p>
  <br>This summary provides key points from our privacy notice, but you can find out more details about any of these topics by clicking the link following each key point or by using our table of contents below to find the section you are looking for. You can also click&nbsp;here&nbsp;to go directly to our table of contents.
</p>
<p>
  <br>What personal information do we process? When you visit, use, or navigate our Services, we may process personal information depending on how you interact with CloudOnex and the Services, the choices you make, and the products and features you use. Click&nbsp;here&nbsp;to learn more.
</p>
<p>
  <br>Do we process any sensitive personal information? We do not process sensitive personal information.
</p>
<p>
  <br>Do we receive any information from third parties? We do not receive any information from third parties.
</p>
<p>
  <br>How do we process your information? We process your information to provide, improve, and administer our Services, communicate with you, for security and fraud prevention, and to comply with law. We may also process your information for other purposes with your consent. We process your information only when we have a valid legal reason to do so. Click&nbsp;here&nbsp;to learn more.
</p>
<p>
  <br>In what situations and with which parties do we share personal information? We may share information in specific situations and with specific third parties. Click&nbsp;here&nbsp;to learn more.
</p>
<p>
  <br>What are your rights? Depending on where you are located geographically, the applicable privacy law may mean you have certain rights regarding your personal information. Click&nbsp;here&nbsp;to learn more.
</p>
<p>
  <br>How do you exercise your rights? The easiest way to exercise your rights is by filling out our data subject request form available here, or by contacting us. We will consider and act upon any request in accordance with applicable data protection laws.
</p>
<p>
  <br>Want to learn more about what CloudOnex does with any information we collect? Click&nbsp;here&nbsp;to review the notice in full.
</p>
<p>
  <br>1. WHAT INFORMATION DO WE COLLECT?
</p>
<p>
  <br>Personal information you disclose to us
</p>
<p>
  <br>In Short:&nbsp;We collect personal information that you provide to us.
</p>
<p>
  <br>We collect personal information that you voluntarily provide to us when you register on the Services,&nbsp;express an interest in obtaining information about us or our products and Services, when you participate in activities on the Services, or otherwise when you contact us.
</p>
<p>&nbsp;</p>
<p>Personal Information Provided by You. The personal information that we collect depends on the context of your interactions with us and the Services, the choices you make, and the products and features you use. The personal information we collect may include the following: <br>names </p>
<p>phone numbers</p>
<p>email addresses</p>
<p>usernames</p>
<p>passwords</p>
<p>Sensitive Information. We do not process sensitive information.</p>
<p>&nbsp;</p>
<p>Payment Data. We may collect data necessary to process your payment if you make purchases, such as your payment instrument number, and the security code associated with your payment instrument. All payment data is stored by __________. You may find their privacy notice link(s) here: __________.</p>
<p>&nbsp;</p>
<p>All personal information that you provide to us must be true, complete, and accurate, and you must notify us of any changes to such personal information.</p>
<p>&nbsp;</p>
<p>2. HOW DO WE PROCESS YOUR INFORMATION?</p>
<p>
  <br>In Short:&nbsp;We process your information to provide, improve, and administer our Services, communicate with you, for security and fraud prevention, and to comply with law. We may also process your information for other purposes with your consent.
</p>
<p>
  <br>We process your personal information for a variety of reasons, depending on how you interact with our Services, including: <br>To facilitate account creation and authentication and otherwise manage user accounts.&nbsp;We may process your information so you can create and log in to your account, as well as keep your account in working order.
</p>
<p>
  <br>To save or protect an individual\'s vital interest. We may process your information when necessary to save or protect an individual’s vital interest, such as to prevent harm.
</p>
<p>&nbsp;</p>
<p>3. WHAT LEGAL BASES DO WE RELY ON TO PROCESS YOUR INFORMATION?</p>
<p>
  <br>In Short:&nbsp;We only process your personal information when we believe it is necessary and we have a valid legal reason (i.e., legal basis) to do so under applicable law, like with your consent, to comply with laws, to provide you with services to enter into or fulfill our contractual obligations, to protect your rights, or to fulfill our legitimate business interests.
</p>
<p>
  <br>If you are located in the EU or UK, this section applies to you.
</p>
<p>
  <br>The General Data Protection Regulation (GDPR) and UK GDPR require us to explain the valid legal bases we rely on in order to process your personal information. As such, we may rely on the following legal bases to process your personal information: <br>Consent.&nbsp;We may process your information if you have given us permission (i.e., consent) to use your personal information for a specific purpose. You can withdraw your consent at any time. Click&nbsp;here&nbsp;to learn more.
</p>
<p>Legal Obligations. We may process your information where we believe it is necessary for compliance with our legal obligations, such as to cooperate with a law enforcement body or regulatory agency, exercise or defend our legal rights, or disclose your information as evidence in litigation in which we are involved.</p>
<p>
  <br>Vital Interests. We may process your information where we believe it is necessary to protect your vital interests or the vital interests of a third party, such as situations involving potential threats to the safety of any person.
</p>
<p>&nbsp;</p>
<p>If you are located in Canada, this section applies to you.</p>
<p>
  <br>We may process your information if you have given us specific permission (i.e., express consent) to use your personal information for a specific purpose, or in situations where your permission can be inferred (i.e., implied consent). You can withdraw your consent at any time. Click&nbsp;here&nbsp;to learn more.
</p>
<p>
  <br>In some exceptional cases, we may be legally permitted under applicable law to process your information without your consent, including, for example: <br>If collection is clearly in the interests of an individual and consent cannot be obtained in a timely way
</p>
<p>For investigations and fraud detection and prevention</p>
<p>For business transactions provided certain conditions are met</p>
<p>If it is contained in a witness statement and the collection is necessary to assess, process, or settle an insurance claim</p>
<p>For identifying injured, ill, or deceased persons and communicating with next of kin</p>
<p>If we have reasonable grounds to believe an individual has been, is, or may be victim of financial abuse</p>
<p>If it is reasonable to expect collection and use with consent would compromise the availability or the accuracy of the information and the collection is reasonable for purposes related to investigating a breach of an agreement or a contravention of the laws of Canada or a province</p>
<p>If disclosure is required to comply with a subpoena, warrant, court order, or rules of the court relating to the production of records</p>
<p>If it was produced by an individual in the course of their employment, business, or profession and the collection is consistent with the purposes for which the information was produced</p>
<p>If the collection is solely for journalistic, artistic, or literary purposes</p>
<p>If the information is publicly available and is specified by the regulations</p>
<p>&nbsp;</p>
<p>4. WHEN AND WITH WHOM DO WE SHARE YOUR PERSONAL INFORMATION?</p>
<p>
  <br>In Short:&nbsp;We may share information in specific situations described in this section and/or with the following third parties.
</p>
<p>&nbsp;</p>
<p>We may need to share your personal information in the following situations: <br>Business Transfers. We may share or transfer your information in connection with, or during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company. </p>
<p>&nbsp;</p>
<p>5. DO WE USE COOKIES AND OTHER TRACKING TECHNOLOGIES?</p>
<p>
  <br>In Short:&nbsp;We may use cookies and other tracking technologies to collect and store your information.
</p>
<p>
  <br>We may use cookies and similar tracking technologies (like web beacons and pixels) to access or store information. Specific information about how we use such technologies and how you can refuse certain cookies is set out in our Cookie Notice.
</p>
<p>
  <br>6. IS YOUR INFORMATION TRANSFERRED INTERNATIONALLY?
</p>
<p>
  <br>In Short:&nbsp;We may transfer, store, and process your information in countries other than your own.
</p>
<p>
  <br>Our servers are located in. If you are accessing our Services from outside, please be aware that your information may be transferred to, stored, and processed by us in our facilities and by those third parties with whom we may share your personal information (see "WHEN AND WITH WHOM DO WE SHARE YOUR PERSONAL INFORMATION?" above), in &nbsp;and other countries.
</p>
<p>
  <br>If you are a resident in the European Economic Area (EEA) or United Kingdom (UK), then these countries may not necessarily have data protection laws or other similar laws as comprehensive as those in your country. However, we will take all necessary measures to protect your personal information in accordance with this privacy notice and applicable law.
</p>
<p>
  <br>7. HOW LONG DO WE KEEP YOUR INFORMATION?
</p>
<p>
  <br>In Short:&nbsp;We keep your information for as long as necessary to fulfill the purposes outlined in this privacy notice unless otherwise required by law.
</p>
<p>
  <br>We will only keep your personal information for as long as it is necessary for the purposes set out in this privacy notice, unless a longer retention period is required or permitted by law (such as tax, accounting, or other legal requirements). No purpose in this notice will require us keeping your personal information for longer than the period of time in which users have an account with us.
</p>
<p>
  <br>When we have no ongoing legitimate business need to process your personal information, we will either delete or anonymize such information, or, if this is not possible (for example, because your personal information has been stored in backup archives), then we will securely store your personal information and isolate it from any further processing until deletion is possible.
</p>
<p>
  <br>8. WHAT ARE YOUR PRIVACY RIGHTS?
</p>
<p>
  <br>In Short:&nbsp;In some regions, such as the European Economic Area (EEA), United Kingdom (UK), and Canada, you have rights that allow you greater access to and control over your personal information.&nbsp;You may review, change, or terminate your account at any time.
</p>
<p>
  <br>In some regions (like the EEA, UK, and Canada), you have certain rights under applicable data protection laws. These may include the right (i) to request access and obtain a copy of your personal information, (ii) to request rectification or erasure; (iii) to restrict the processing of your personal information; and (iv) if applicable, to data portability. In certain circumstances, you may also have the right to object to the processing of your personal information. You can make such a request by contacting us by using the contact details provided in the section "HOW CAN YOU CONTACT US ABOUT THIS NOTICE?" below.
</p>
<p>
  <br>We will consider and act upon any request in accordance with applicable data protection laws. <br>&nbsp; <br>If you are located in the EEA or UK and you believe we are unlawfully processing your personal information, you also have the right to complain to your local data protection supervisory authority. You can find their contact details here: https://ec.europa.eu/justice/data-protection/bodies/authorities/index_en.htm.
</p>
<p>
  <br>If you are located in Switzerland, the contact details for the data protection authorities are available here: https://www.edoeb.admin.ch/edoeb/en/home.html.
</p>
<p>
  <br>Withdrawing your consent: If we are relying on your consent to process your personal information, which may be express and/or implied consent depending on the applicable law, you have the right to withdraw your consent at any time. You can withdraw your consent at any time by contacting us by using the contact details provided in the section "HOW CAN YOU CONTACT US ABOUT THIS NOTICE?" below.
</p>
<p>
  <br>However, please note that this will not affect the lawfulness of the processing before its withdrawal nor, when applicable law allows, will it affect the processing of your personal information conducted in reliance on lawful processing grounds other than consent.
</p>
<p>
  <br>Opting out of marketing and promotional communications:&nbsp;You can unsubscribe from our marketing and promotional communications at any time by clicking on the unsubscribe link in the emails that we send, or by contacting us using the details provided in the section "HOW CAN YOU CONTACT US ABOUT THIS NOTICE?" below. You will then be removed from the marketing lists. However, we may still communicate with you — for example, to send you service-related messages that are necessary for the administration and use of your account, to respond to service requests, or for other non-marketing purposes.
</p>
<p>
  <br>Account Information
</p>
<p>
  <br>If you would at any time like to review or change the information in your account or terminate your account, you can: <br>Log in to your account settings and update your user account.
</p>
<p>Upon your request to terminate your account, we will deactivate or delete your account and information from our active databases. However, we may retain some information in our files to prevent fraud, troubleshoot problems, assist with any investigations, enforce our legal terms and/or comply with applicable legal requirements.</p>
<p>
  <br>9. CONTROLS FOR DO-NOT-TRACK FEATURES
</p>
<p>
  <br>Most web browsers and some mobile operating systems and mobile applications include a Do-Not-Track ("DNT") feature or setting you can activate to signal your privacy preference not to have data about your online browsing activities monitored and collected. At this stage no uniform technology standard for recognizing and implementing DNT signals has been finalized. As such, we do not currently respond to DNT browser signals or any other mechanism that automatically communicates your choice not to be tracked online. If a standard for online tracking is adopted that we must follow in the future, we will inform you about that practice in a revised version of this privacy notice.
</p>
<p>
  <br>10. DO CALIFORNIA RESIDENTS HAVE SPECIFIC PRIVACY RIGHTS?
</p>
<p>
  <br>In Short:&nbsp;Yes, if you are a resident of California, you are granted specific rights regarding access to your personal information.
</p>
<p>
  <br>California Civil Code Section 1798.83, also known as the "Shine The Light" law, permits our users who are California residents to request and obtain from us, once a year and free of charge, information about categories of personal information (if any) we disclosed to third parties for direct marketing purposes and the names and addresses of all third parties with which we shared personal information in the immediately preceding calendar year. If you are a California resident and would like to make such a request, please submit your request in writing to us using the contact information provided below.
</p>
<p>
  <br>If you are under 18 years of age, reside in California, and have a registered account with Services, you have the right to request removal of unwanted data that you publicly post on the Services. To request removal of such data, please contact us using the contact information provided below and include the email address associated with your account and a statement that you reside in California. We will make sure the data is not publicly displayed on the Services, but please be aware that the data may not be completely or comprehensively removed from all our systems (e.g., backups, etc.).
</p>
<p>
  <br>CCPA Privacy Notice
</p>
<p>
  <br>The California Code of Regulations defines a "resident" as:
</p>
<p>
  <br>(1) every individual who is in the State of California for other than a temporary or transitory purpose and <br>(2) every individual who is domiciled in the State of California who is outside the State of California for a temporary or transitory purpose
</p>
<p>
  <br>All other individuals are defined as "non-residents."
</p>
<p>
  <br>If this definition of "resident" applies to you, we must adhere to certain rights and obligations regarding your personal information.
</p>
<p>
  <br>What categories of personal information do we collect?
</p>
<p>
  <br>We have collected the following categories of personal information in the past twelve (12) months:
</p>
<p>&nbsp;</p>
<p>We may also collect other personal information outside of these categories through instances where you interact with us in person, online, or by phone or mail in the context of: <br>Receiving help through our customer support channels; </p>
<p>Participation in customer surveys or contests; and</p>
<p>Facilitation in the delivery of our Services and to respond to your inquiries. <br>How do we use and share your personal information? </p>
<p>
  <br>More information about our data collection and sharing practices can be found in this privacy notice.
</p>
<p>
  <br>You may contact us or by referring to the contact details at the bottom of this document.
</p>
<p>
  <br>If you are using an authorized agent to exercise your right to opt out we may deny a request if the authorized agent does not submit proof that they have been validly authorized to act on your behalf.
</p>
<p>
  <br>Will your information be shared with anyone else?
</p>
<p>
  <br>We may disclose your personal information with our service providers pursuant to a written contract between us and each service provider. Each service provider is a for-profit entity that processes the information on our behalf, following the same strict privacy protection obligations mandated by the CCPA.
</p>
<p>
  <br>We may use your personal information for our own business purposes, such as for undertaking internal research for technological development and demonstration. This is not considered to be "selling" of your personal information.
</p>
<p>
  <br>Your rights with respect to your personal data
</p>
<p>
  <br>Right to request deletion of the data — Request to delete
</p>
<p>
  <br>You can ask for the deletion of your personal information. If you ask us to delete your personal information, we will respect your request and delete your personal information, subject to certain exceptions provided by law, such as (but not limited to) the exercise by another consumer of his or her right to free speech, our compliance requirements resulting from a legal obligation, or any processing that may be required to protect against illegal activities.
</p>
<p>
  <br>Right to be informed — Request to know
</p>
<p>
  <br>Depending on the circumstances, you have a right to know: <br>whether we collect and use your personal information;
</p>
<p>the categories of personal information that we collect;</p>
<p>the purposes for which the collected personal information is used;</p>
<p>whether we sell or share personal information to third parties;</p>
<p>the categories of personal information that we sold, shared, or disclosed for a business purpose;</p>
<p>the categories of third parties to whom the personal information was sold, shared, or disclosed for a business purpose;</p>
<p>the business or commercial purpose for collecting, selling, or sharing personal information; and</p>
<p>the specific pieces of personal information we collected about you. <br>In accordance with applicable law, we are not obligated to provide or delete consumer information that is de-identified in response to a consumer request or to re-identify individual data to verify a consumer request. </p>
<p>
  <br>Right to Non-Discrimination for the Exercise of a Consumer’s Privacy Rights
</p>
<p>
  <br>We will not discriminate against you if you exercise your privacy rights.
</p>
<p>
  <br>Right to Limit Use and Disclosure of Sensitive Personal Information
</p>
<p>&nbsp;</p>
<p>We do not process consumer\'s sensitive personal information.</p>
<p>&nbsp;</p>
<p>Verification process</p>
<p>
  <br>Upon receiving your request, we will need to verify your identity to determine you are the same person about whom we have the information in our system. These verification efforts require us to ask you to provide information so that we can match it with information you have previously provided us. For instance, depending on the type of request you submit, we may ask you to provide certain information so that we can match the information you provide with the information we already have on file, or we may contact you through a communication method (e.g., phone or email) that you have previously provided to us. We may also use other verification methods as the circumstances dictate.
</p>
<p>
  <br>We will only use personal information provided in your request to verify your identity or authority to make the request. To the extent possible, we will avoid requesting additional information from you for the purposes of verification. However, if we cannot verify your identity from the information already maintained by us, we may request that you provide additional information for the purposes of verifying your identity and for security or fraud-prevention purposes. We will delete such additionally provided information as soon as we finish verifying you.
</p>
<p>
  <br>Other privacy rights
</p>
<p>You may object to the processing of your personal information.</p>
<p>You may request correction of your personal data if it is incorrect or no longer relevant, or ask to restrict the processing of the information.</p>
<p>You can designate an authorized agent to make a request under the CCPA on your behalf. We may deny a request from an authorized agent that does not submit proof that they have been validly authorized to act on your behalf in accordance with the CCPA. <br>To exercise these rights, you can contact us&nbsp;or by referring to the contact details at the bottom of this document. If you have a complaint about how we handle your data, we would like to hear from you. </p>';
    $post->save();

    $post = new Post();
    $post->uuid = Str::uuid();
    $post->workspace_id = $workspace->id;
    $post->type = 'page';
    $post->api_name = 'terms_of_service';
    $post->title = __('Terms of Service');
    $post->slug = 'terms-of-service';
    $post->content = '<h2><strong>Terms and Conditions</strong></h2>
<p>Welcome to&nbsp;CloudOnex!</p>
<p>These terms and conditions outline the rules and regulations for the use of&nbsp;CloudOnex\'s Website, located at <a href="https://www.cloudonex.com" target="_blank" rel="noopener">www.cloudonex.com</a>.</p>
<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use&nbsp;CloudOnex&nbsp;if you do not agree to take all of the terms and conditions stated on this page.</p>
<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: &ldquo;Client&rdquo;, &ldquo;You&rdquo; and &ldquo;Your&rdquo; refers to you, the person log on this website and compliant to the Company\'s terms and conditions. &ldquo;The Company&rdquo;, &ldquo;Ourselves&rdquo;, &ldquo;We&rdquo;, &ldquo;Our&rdquo; and &ldquo;Us&rdquo;, refers to our Company. &ldquo;Party&rdquo;, &ldquo;Parties&rdquo;, or &ldquo;Us&rdquo;, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client\'s needs in respect of provision of the Company\'s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
<h3><strong>Cookies</strong></h3>
<p>We employ the use of cookies. By accessing&nbsp;CloudOnex, you agreed to use cookies in agreement with the&nbsp;CloudOnex\'s Privacy Policy.</p>
<p>Most interactive websites use cookies to let us retrieve the user\'s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>
<h3><strong>License</strong></h3>
<p>Unless otherwise stated,&nbsp;CloudOnex&nbsp;and/or its licensors own the intellectual property rights for all material on&nbsp;CloudOnex. All intellectual property rights are reserved. You may access this from&nbsp;CloudOnex&nbsp;for your own personal use subjected to restrictions set in these terms and conditions.</p>
<p>You must not:</p>
<ul>
<li>Republish material from&nbsp;CloudOnex</li>
<li>Sell, rent or sub-license material from&nbsp;CloudOnex</li>
<li>Reproduce, duplicate or copy material from&nbsp;CloudOnex</li>
<li>Redistribute content from&nbsp;CloudOnex</li>
</ul>
<p>This Agreement shall begin on the date hereof.</p>
<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website.&nbsp;CloudOnex&nbsp;does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of&nbsp;CloudOnex,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws,&nbsp;CloudOnex&nbsp;shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>
<p>CloudOnex&nbsp;reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>
<p>You warrant and represent that:</p>
<ul>
<li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
<li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
<li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>
<li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>
</ul>
<p>You hereby grant&nbsp;CloudOnex&nbsp;a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>
<h3><strong>Hyperlinking to our Content</strong></h3>
<p>The following organizations may link to our Website without prior written approval:</p>
<ul>
<li>Government agencies;</li>
<li>Search engines;</li>
<li>News organizations;</li>
<li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>
<li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>
</ul>
<p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party\'s site.</p>
<p>We may consider and approve other link requests from the following types of organizations:</p>
<ul>
<li>commonly-known consumer and/or business information sources;</li>
<li>dot.com community sites;</li>
<li>associations or other groups representing charities;</li>
<li>online directory distributors;</li>
<li>internet portals;</li>
<li>accounting, law and consulting firms; and</li>
<li>educational institutions and trade associations.</li>
</ul>
<p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of&nbsp;CloudOnex; and (d) the link is in the context of general resource information.</p>
<p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site.</p>
<p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to&nbsp;CloudOnex. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>
<p>Approved organizations may hyperlink to our Website as follows:</p>
<ul>
<li>By use of our corporate name; or</li>
<li>By use of the uniform resource locator being linked to; or</li>
<li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party\'s site.</li>
</ul>
<p>No use of&nbsp;CloudOnex\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>
<h3><strong>iFrames</strong></h3>
<p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>
<h3><strong>Content Liability</strong></h3>
<p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>
<h3><strong>Reservation of Rights</strong></h3>
<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it\'s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>
<h3><strong>Removal of links from our website</strong></h3>
<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>
<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>
<h3><strong>Disclaimer</strong></h3>
<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>
<ul>
<li>limit or exclude our or your liability for death or personal injury;</li>
<li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
<li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
<li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
</ul>
<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>
<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>';
    $post->save();




    $available_modules = require lightPath('modules.php');
    $modules = [];
    foreach ($available_modules as $key => $value) {
        $modules[$key] = true;
    }

    $subscription_plans = [
        [
            'name' => __('Basic'),
            'price_monthly' => 4.99,
            'price_yearly' => 49.99,
            'is_featured' => false,
            'features' => [
                __('Single User'),
                __('1GB Storage'),
                __('Create & Share Documents'),
                __('Create & Share Spreadsheets'),
                __('Quick Share'),
                __('Image Editor'),
                __('Digital Asset Management'),
                __('Calendar'),
                __('Address Book'),
                __('Basic Support'),
            ],
            'modules' => $modules,
        ],
        [
            'name' => __('Standard'),
            'price_monthly' => 9.99,
            'price_yearly' => 99.99,
            'is_featured' => true,
            'features' => [
                __('2 Users'),
                __('5GB Storage'),
                __('Create & Share Documents'),
                __('Create & Share Spreadsheets'),
                __('Quick Share'),
                __('Image Editor'),
                __('Digital Asset Management'),
                __('Calendar'),
                __('Address Book'),
                __('Standard Support'),
            ],
            'modules' => $modules,
        ],
        [
            'name' => __('Premium'),
            'price_monthly' => 19.99,
            'price_yearly' => 199.99,
            'is_featured' => false,
            'features' => [
                __('Unlimited Users'),
                __('10GB Storage'),
                __('Create & Share Documents'),
                __('Create & Share Spreadsheets'),
                __('Quick Share'),
                __('Image Editor'),
                __('Digital Asset Management'),
                __('Calendar'),
                __('Address Book'),
                __('Premium Support'),
            ],
            'modules' => $modules,
        ]
    ];

    foreach ($subscription_plans as $plan) {
        $subscription_plan = new SubscriptionPlan();
        $subscription_plan->workspace_id = $workspace->id;
        $subscription_plan->uuid = Str::uuid();
        $subscription_plan->name = $plan['name'];
        $subscription_plan->price_monthly = $plan['price_monthly'];
        $subscription_plan->price_yearly = $plan['price_yearly'];
        $subscription_plan->is_featured = $plan['is_featured'] ?? false;
        $subscription_plan->features = $plan['features'];
        $subscription_plan->modules = $plan['modules'];
        $subscription_plan->save();
    }

}
