<?php
/* OBSOLETE 
require_once('common/include/Error.class.php');
require_once('www/include/utils.php');

require_once(dirname(__FILE__).'/../include/Tracker/Tracker_Import.class.php');
//Mock::generatePartial('Tracker_Import','Tracker_ImportTestVersion',array());

require_once('common/language/BaseLanguage.class.php');
Mock::generate('BaseLanguage');

//require_once(dirname(__FILE__).'/../include/ArtifactField.class.php');
//Mock::generatePartial('ArtifactField','ArtifactFieldTestVersion',array('getLabel','getName','isEmptyOk','getDisplayType','isDateField'));

//substitute ArtifactField
class Tracker_ImportTest_ArtifactField {
  function getLabel() {}
  function getName() {}
  function isEmptyOk() {}
  function getDisplayType() {}
  function isDateField() {}
  function isSelectBox() {}
  function isMultiSelectBox() {}
}

Mock::generate('Tracker_ImportTest_ArtifactField','ArtifactFieldImportVersion');

Mock::generatePartial('Tracker_Import','ArtifactImportFollowUpCommentsTestVersion', array());
Mock::generatePartial('Tracker_Import', 'ArtifactImportTestVersion', array('getUserManager', 'getUserByUserName'));

require_once('common/user/User.class.php');
Mock::generate('User');

require_once(dirname(__FILE__).'/../include/ArtifactFieldFactory.class.php');
Mock::generate('ArtifactFieldFactory');
//class ArtifactImportTest_ArtifactFieldFactory {
//  function getFieldFromName() {}
//  function getAllUsedFields() {}
//}
//Mock::generate('ArtifactImportTest_ArtifactFieldFactory','ArtifactFieldFactory');

require_once(dirname(__FILE__).'/../include/Tracker/Tracker_FieldFactory.class.php');
Mock::generate('Tracker_FieldFactory');

// class Tracker_ImportTest_Tracker_FieldFactory {
//   function getFieldFromName() {}
//   function getAllUsedFields() {}
// }
// Mock::generate('Tracker_ImportTest_Tracker_FieldFactory','Tracker_FieldFactory');


require_once(dirname(__FILE__).'/../include/Tracker/Tracker.class.php');
Mock::generatePartial('Tracker','TrackerTestVersion',array('getName','allowsAnon','getID','userIsAdmin'));

// class Tracker {
//   function getName() {}
//   function allowsAnon() {}
//   function getID() {}
//   function userIsAdmin() {}
// }
// Mock::generate('Tracker');


*/

/**
 * Copyright (c) Xerox Corporation, Codendi Team, 2001-2009. All rights reserved
 * 
 * 
 *
 * Tests the class Tracker_Import
 */
class Tracker_ImportTest extends UnitTestCase {
    /**
     * Constructor of the test. Can be ommitted.
     * Usefull to set the name of the test
     */
    function Tracker_ImportTest($name = 'Tracker_Import test') {
        $this->UnitTestCase($name);
    }
/* OBSOLETE 

    function testALL() {

      $GLOBALS['Language'] = new MockBaseLanguage($this);
      $GLOBALS['Language']->setReturnValue('getText','on',array('global','on'));
      $GLOBALS['Language']->setReturnValue('getText','by',array('global','by'));
      $GLOBALS['Language']->setReturnValue('getText','none',array('global','none'));
      $GLOBALS['Language']->setReturnValue('getText','date',array('tracker_import_utils','date'));


      //////////////////////// var setup //////////////////////
      
      $at = new TrackerTestVersion($this);
      $at->setReturnValue('getName','TestTracker');
      $at->setReturnValue('allowsAnon',false);
      $at->setReturnValue('getID','123');
      $at->setReturnValue('userIsAdmin',true);

      $submitted_by = new ArtifactFieldImportVersion($this);
      $submitted_by->setReturnValue('getLabel','Submitted By');
      $submitted_by->setReturnValue('getName','submitted_by');
      $submitted_by->setReturnValue('isEmptyOk',false);
      $submitted_by->setReturnValue('getDisplayType','SB');
      $submitted_by->setReturnValue('isDateField',false);
      $submitted_by->setReturnValue('isSelectBox',false);
      $submitted_by->setReturnValue('isMultiSelectBox',false);

      $submitted_on = new ArtifactFieldImportVersion($this);
      $submitted_on->setReturnValue('getLabel','Submitted On');
      $submitted_on->setReturnValue('getName','open_date');
      $submitted_on->setReturnValue('isEmptyOk',false);
      $submitted_on->setReturnValue('getDisplayType','DF');
      $submitted_on->setReturnValue('isDateField',false);
      $submitted_on->setReturnValue('isSelectBox',false);
      $submitted_on->setReturnValue('isMultiSelectBox',false);

      $last_update_date = new ArtifactFieldImportVersion($this);
      $last_update_date->setReturnValue('getLabel','Last Modified On');
      $last_update_date->setReturnValue('getName','last_update_date');
      $last_update_date->setReturnValue('isEmptyOk',false);
      $last_update_date->setReturnValue('getDisplayType','DF');
      $last_update_date->setReturnValue('isDateField',true);
      $last_update_date->setReturnValue('isSelectBox',false);
      $last_update_date->setReturnValue('isMultiSelectBox',false);

      $artifact_id = new ArtifactFieldImportVersion($this);
      $artifact_id->setReturnValue('getLabel','Artifact Id');
      $artifact_id->setReturnValue('getName','artifact_id');
      $artifact_id->setReturnValue('isEmptyOk',false);
      $artifact_id->setReturnValue('getDisplayType','TF');
      $artifact_id->setReturnValue('isDateField',false);
      $artifact_id->setReturnValue('isSelectBox',false);
      $artifact_id->setReturnValue('isMultiSelectBox',false);


      $comment_type_id = new ArtifactFieldImportVersion($this);
      $comment_type_id->setReturnValue('getLabel','Comment Type');
      $comment_type_id->setReturnValue('getName','comment_type_id');
      $comment_type_id->setReturnValue('isEmptyOk',true);
      $comment_type_id->setReturnValue('getDisplayType','TF');
      $comment_type_id->setReturnValue('isDateField',false);
      $comment_type_id->setReturnValue('isSelectBox',false);
      $comment_type_id->setReturnValue('isMultiSelectBox',false);

      $assigned_to = new ArtifactFieldImportVersion($this);
      $assigned_to->setReturnValue('getLabel','Assigned To');
      $assigned_to->setReturnValue('getName','assigned_to');
      $assigned_to->setReturnValue('isEmptyOk',false);
      $assigned_to->setReturnValue('getDisplayType','SB');
      $assigned_to->setReturnValue('isDateField',false);
      $assigned_to->setReturnValue('isSelectBox',true);
      $assigned_to->setReturnValue('isMultiSelectBox',false);

      $orig_subm = new ArtifactFieldImportVersion($this);
      $orig_subm->setReturnValue('getLabel','Original Submission');
      $orig_subm->setReturnValue('getName','details');
      $orig_subm->setReturnValue('isEmptyOk',false);
      $orig_subm->setReturnValue('getDisplayType','TA');
      $orig_subm->setReturnValue('isDateField',false);
      $orig_subm->setReturnValue('isSelectBox',false);
      $orig_subm->setReturnValue('isMultiSelectBox',false);

      
      $atf = new MockTracker_FieldFactory($at);
      $atf->setReturnValue('getAllUsedFields',array($submitted_by,$submitted_on,$artifact_id,$comment_type_id,$assigned_to,$orig_subm));
      $atf->setReturnValue('getFieldFromName',$submitted_by,array('submitted_by'));
      $atf->setReturnValue('getFieldFromName',$submitted_on,array('open_date'));
      $atf->setReturnValue('getFieldFromName',$last_update_date,array('last_update_date'));
      $atf->setReturnValue('getFieldFromName',$artifact_id,array('artifact_id'));
      $atf->setReturnValue('getFieldFromName',$assigned_to,array('assigned_to'));
      $atf->setReturnValue('getFieldFromName',$comment_type_id,array('comment_type_id'));
      $atf->setReturnValue('getFieldFromName',$orig_subm,array('details'));

      
      ///////////////////// test parseFieldNames /////////////////////

      $test = new Tracker_Import($at,$atf,'group');
      $test->parseFieldNames(array('Submitted By','Submitted On','Assigned To','Original Submission'));
      $this->assertFalse($test->isError());

      // need mandatory field assigned_to
      $test = new Tracker_Import($at,$atf,'group');
      $test->parseFieldNames(array('Submitted By'));
      $this->assertTrue($test->isError());


      //comment type is not taken into account
      $test = new Tracker_Import($at,$atf,'group');
      $test->parseFieldNames(array('Comment Type','Assigned To','Original Submission'));
      $this->assertTrue($test->isError());

      $test = new Tracker_Import($at,$atf,'group');
      $test->parseFieldNames(array('Follow-up Comments','Depend on','CC List','CC Comment','Assigned To','Original Submission'));
      $this->assertFalse($test->isError());



      /////////////////// test checkValues ///////////////////////////

      // can not check submitted_by values (can not get user_id from here)
      $test = new Tracker_Import($at,$atf,'group');
      $test->parseFieldNames(array('Follow-up Comments','Depend on','CC List','CC Comment','Assigned To','Original Submission'));
      $test->predefined_values = array();
      $test->predefined_values[4] = array('schneide'=>'');
      $data = array($GLOBALS['Language']->getText('tracker_import_utils','no_followups'),'','','','schneide','my original submission');
      $test->checkValues('1',$data,false);
      $this->assertFalse($test->isError());

      // schnuffi not in predefined values of assigned_to
      $data = array($GLOBALS['Language']->getText('tracker_import_utils','no_followups'),'','','','schnuffi','my original submission');
      $test->checkValues('1',$data,false);
      $this->assertTrue($test->isError());
      $test->clearError();

      //test mb fields
      $mbox_field = new ArtifactFieldImportVersion();
      $mbox_field->setReturnValue('getLabel','MB Field');
      $mbox_field->setReturnValue('getName','mbox_field');
      $mbox_field->setReturnValue('isEmptyOk',true);
      $mbox_field->setReturnValue('getDisplayType','MB');
      $mbox_field->setReturnValue('isDateField',false);
      $mbox_field->setReturnValue('isSelectBox',false);
      $mbox_field->setReturnValue('isMultiSelectBox',true);

      $sbox_field = new ArtifactFieldImportVersion();
      $sbox_field->setReturnValue('getLabel','SB Field');
      $sbox_field->setReturnValue('getName','sbox_field');
      $sbox_field->setReturnValue('isEmptyOk',false);
      $sbox_field->setReturnValue('getDisplayType','SB');
      $sbox_field->setReturnValue('isDateField',false);
      $sbox_field->setReturnValue('isSelectBox',true);
      $sbox_field->setReturnValue('isMultiSelectBox',false);


      $atf = new MockTracker_FieldFactory($this);
      $atf->setReturnValue('getAllUsedFields',array($submitted_by,$submitted_on,$artifact_id,$comment_type_id,$assigned_to,$orig_subm,$mbox_field,$sbox_field));
      $atf->setReturnValue('getFieldFromName',$submitted_by,array('submitted_by'));
      $atf->setReturnValue('getFieldFromName',$submitted_on,array('open_date'));
      $atf->setReturnValue('getFieldFromName',$last_update_date,array('last_update_date'));
      $atf->setReturnValue('getFieldFromName',$artifact_id,array('artifact_id'));
      $atf->setReturnValue('getFieldFromName',$assigned_to,array('assigned_to'));
      $atf->setReturnValue('getFieldFromName',$comment_type_id,array('comment_type_id'));
      $atf->setReturnValue('getFieldFromName',$orig_subm,array('details'));
      $atf->setReturnValue('getFieldFromName',$mbox_field,array('mbox_field'));
      $atf->setReturnValue('getFieldFromName',$sbox_field,array('sbox_field'));


      $test = new Tracker_Import($at,$atf,'group');
      $test->parseFieldNames(array('Follow-up Comments','Depend on','CC List','CC Comment','Assigned To','Original Submission','MB Field','SB Field'));
      $test->predefined_values = array();
      $test->predefined_values[4] = array('schneide'=>'');
      $test->predefined_values[6] = array('one'=>'','two'=>'','three'=>'');
      $test->predefined_values[7] = array('blue'=>'','yellow'=>'','red'=>'');
      $data = array($GLOBALS['Language']->getText('tracker_import_utils','no_followups'),'','','','schneide','my original submission',
            'one,two,'.$GLOBALS['Language']->getText('global','none'),'yellow');
      $test->checkValues('1',$data,false);
      $this->assertFalse($test->isError());


      $data = array($GLOBALS['Language']->getText('tracker_import_utils','no_followups'),'','','','schneide','my original submission','one,two,four','yellow');
      $test->checkValues('1',$data,false);
      $this->assertTrue($test->isError());
      $test->clearError();

      //check mandatory fields
      $data = array($GLOBALS['Language']->getText('tracker_import_utils','no_followups'),'','','','schneide','','one,two,four','yellow');
      $test->checkValues('1',$data,false);
      $this->assertTrue($test->isError());
      $test->clearError();

      $data = array($GLOBALS['Language']->getText('tracker_import_utils','no_followups'),'','','','schneide','my original submission','one,two,four',$GLOBALS['Language']->getText('global','none'));
      $test->checkValues('1',$data,false);
      $this->assertTrue($test->isError());
      $test->clearError();


      //test date format
      //submitted on is allowed to be void, we set it to current date on insert into DB
      $test = new Tracker_Import($at,$atf,'group');
      $test->parseFieldNames(array('Follow-up Comments','Depend on','CC List','CC Comment','Assigned To','Original Submission','MB Field','SB Field','Submitted On'));
      $data = array($GLOBALS['Language']->getText('tracker_import_utils','no_followups'),'','','','schneide','my original submission','one,two,four','yellow','');
      $test->checkValues('1',$data,false);
      $this->assertFalse($test->isError());

      //sys_date_fmt
      $data = array($GLOBALS['Language']->getText('tracker_import_utils','no_followups'),'','','','schneide','my original submission','one,two,four','yellow','2004-Feb-03 16:13');
      $test->checkValues('1',$data,false);
      $this->assertFalse($test->isError());

      //xls date format
      $data = array($GLOBALS['Language']->getText('tracker_import_utils','no_followups'),'','','','schneide','my original submission','one,two,four','yellow','2/3/2004 16:13');
      $test->checkValues('1',$data,false);
      $this->assertFalse($test->isError());

      //short sys_date_fmt
      $data = array($GLOBALS['Language']->getText('tracker_import_utils','no_followups'),'','','','schneide','my original submission','one,two,four','yellow','2004-Feb-03');
      $test->checkValues('1',$data,false);
      $this->assertFalse($test->isError());

      //short xls date format
      $data = array($GLOBALS['Language']->getText('tracker_import_utils','no_followups'),'','','','schneide','my original submission','one,two,four','yellow','2/3/2004');
      $test->checkValues('1',$data,false);
      $this->assertFalse($test->isError());


      /////////////////// test parseFollowUpComments ///////////////////

      
      $aff = new MockTracker_FieldFactory($this);
      $aff->setReturnValue('getAllUsedFields',array());
      $aff->setReturnValue('getFieldFromName',$submitted_by,array('submitted_by'));
      $aff->setReturnValue('getFieldFromName',$submitted_on,array('open_date'));
      $aff->setReturnValue('getFieldFromName',$last_update_date,array('last_update_date'));

      $test = new Tracker_Import($at,$aff,'group');
      $test->parseFieldNames(array('Follow-up Comments'));
      $parsed_comments = array();
      $art_id = '1149';

      $followup_comments= "Follow-ups
**********

------------------------------------------------------------------
".$GLOBALS['Language']->getText('tracker_import_utils','date').": 2005-09-02 18:18              ".$GLOBALS['Language']->getText('global','by').": doswald
8/17/2004 4:21:57 PM New Entry
8/17/2004 4:24:38 PM DCO: Accepted for investigation, Prio Major 2 Assigned Cyrkin, Tonya
9/14/2004 2:13:03 PM DCO: Waiting on new database from Craig DeHond.
";

      $um = new MockUserManager($this);
      $ai = new ArtifactImportTestVersion($this);
      $user =new MockUser($this);
      
      $ai->setReturnReference('getUserManager', $um);
      $um->setReturnReference('getUserByUserName', $user);
      
      $ai->ArtifactImport($at,$aff,'group');
     
      $ai->parseFollowUpComments($followup_comments,$parsed_comments,$art_id,true);
      
      $this->assertFalse($ai->isError());
      $this->assertEqual($parsed_comments[0]['date'],'2005-09-02 18:18');
      $this->assertEqual($parsed_comments[0]['type'],$GLOBALS['Language']->getText('global','none'));
      $this->assertEqual($parsed_comments[0]['by'],'doswald');


      $parsed_comments = array();
      $followup_comments= "Follow-ups
**********

------------------------------------------------------------------
".$GLOBALS['Language']->getText('tracker_import_utils','date').": 2005-10-19 18:28              ".$GLOBALS['Language']->getText('global','by').": doswald
Excel issue, reassigned to Gene, reduced to Ordinary

------------------------------------------------------------------
".$GLOBALS['Language']->getText('tracker_import_utils','date').": 2005-09-02 16:51              ".$GLOBALS['Language']->getText('global','by').": doswald
1/18/2005 10:09:24 AM New Entry
1/18/2005 10:10:58 AM DCO: Accepted for investigation, Prio Major  Assigned Unassigned
";

      $ai->parseFollowUpComments($followup_comments,$parsed_comments,$art_id,true);
      $this->assertFalse($ai->isError());
      $this->assertEqual($parsed_comments[0]['date'],'2005-10-19 18:28');
      $this->assertEqual($parsed_comments[0]['type'],$GLOBALS['Language']->getText('global','none'));
      $this->assertEqual($parsed_comments[0]['by'],'doswald');
      $this->assertEqual($parsed_comments[1]['date'],'2005-09-02 16:51');
      $this->assertEqual($parsed_comments[1]['type'],$GLOBALS['Language']->getText('global','none'));
      $this->assertEqual($parsed_comments[1]['by'],'doswald');
      
 
      $parsed_comments = array();

      $followup_comments= "==================================================
".$GLOBALS['Language']->getText('tracker_import_utils','type').": ".$GLOBALS['Language']->getText('global','none')."     ".$GLOBALS['Language']->getText('global','by').": jstidd      ".$GLOBALS['Language']->getText('global','on').": 2000-12-09 00:08

noreply was aliased to codendi-admin in order to prevent failure of delivery (to anybody) for the message.  This will cause all new bugs to be visible to the codendi administrators until an alternate solution is devised.  It seems ill-advised to set the email value in user=100 to null, because we are not sure where this value is used in the system and what the effects will be of possible syntax errors created by the use of null instead of a valid mail address.  What is needed is to alias noreply to a bit bucket.
==================================================
".$GLOBALS['Language']->getText('tracker_import_utils','type').": ".$GLOBALS['Language']->getText('global','none')."     ".$GLOBALS['Language']->getText('global','by').": jstidd      ".$GLOBALS['Language']->getText('global','on').": 2000-12-08 23:06

The cause of this problem is that bugs assigned to 'None' are assigned by default to the default user, user_id=100 by bug_data_create in bugs/bug_data.php.  The email field for user 100 in the database was noreply@sourceforge.net.  This has been changed to noreply@codendi.com.  The Assigned To: field on this bug has been changed to None in order to test this change.
==================================================
".$GLOBALS['Language']->getText('tracker_import_utils','type').": ".$GLOBALS['Language']->getText('global','none')."     ".$GLOBALS['Language']->getText('global','by').": jstidd      ".$GLOBALS['Language']->getText('global','on').": 2000-12-08 22:30

Confirming the previous Followup.  The bug was assigned to jstidd, who was present twice in the To: field of the message.  The followup message was not sent to noreply@sourceforge.net.

==================================================
".$GLOBALS['Language']->getText('tracker_import_utils','type').": ".$GLOBALS['Language']->getText('global','none')."     ".$GLOBALS['Language']->getText('global','by').": jstidd      ".$GLOBALS['Language']->getText('global','on').": 2000-12-08 22:27

Problem also occurs for new bugs posted to a project *with* a New Bugs address.  Apparently, if a bug is assigned to None (which is always the case with a new bug), the copy of the message intended for Assigned To is sent to noreply@sourceforge.net.

";

      $test->parseLegacyDetails($followup_comments,$parsed_comments,$art_id,true);
      $this->assertFalse($test->isError());
      $this->assertEqual($parsed_comments[0]['date'],'2000-12-09 00:08');
      $this->assertEqual($parsed_comments[0]['type'],$GLOBALS['Language']->getText('global','none'));
      $this->assertEqual($parsed_comments[0]['by'],'jstidd');
      $this->assertEqual($parsed_comments[1]['date'],'2000-12-08 23:06');
      $this->assertEqual($parsed_comments[1]['type'],$GLOBALS['Language']->getText('global','none'));
      $this->assertEqual($parsed_comments[1]['by'],'jstidd');
      $this->assertEqual($parsed_comments[2]['type'],$GLOBALS['Language']->getText('global','none'));
      $this->assertEqual($parsed_comments[2]['date'],'2000-12-08 22:30');
      $this->assertEqual($parsed_comments[3]['type'],$GLOBALS['Language']->getText('global','none'));
      $this->assertEqual($parsed_comments[3]['date'],'2000-12-08 22:27');

      $parsed_comments = array();
      $test->parseFollowUpComments($followup_comments,$parsed_comments,$art_id,true);
      $this->assertFalse($test->isError());
      $this->assertEqual($parsed_comments[0]['date'],'2000-12-09 00:08');
      $this->assertEqual($parsed_comments[0]['type'],$GLOBALS['Language']->getText('global','none'));
      $this->assertEqual($parsed_comments[0]['by'],'jstidd');
      $this->assertEqual($parsed_comments[1]['date'],'2000-12-08 23:06');
      $this->assertEqual($parsed_comments[1]['type'],$GLOBALS['Language']->getText('global','none'));
      $this->assertEqual($parsed_comments[1]['by'],'jstidd');
      $this->assertEqual($parsed_comments[2]['type'],$GLOBALS['Language']->getText('global','none'));
      $this->assertEqual($parsed_comments[2]['date'],'2000-12-08 22:30');
      $this->assertEqual($parsed_comments[3]['type'],$GLOBALS['Language']->getText('global','none'));
      $this->assertEqual($parsed_comments[3]['date'],'2000-12-08 22:27');

      

      
      // check by hand: 
      //   double submission (can not access DB from here)
      //   not enough columns in a row
      //   real insertion, real update (can not access DB)
      //   follow-up comment is already in DB or not
       
    }
    
    function testSplitFollowUpComments() {
        $aitv = new ArtifactImportFollowUpCommentsTestVersion($this);
        $followup_comments = file_get_contents(dirname(__FILE__) . '/_fixtures/followup_comments1.txt');
        $comments = $aitv->splitFollowUpComments($followup_comments);
        $this->assertEqual(count($comments), 4 + 1); // + 1 because the follow-up comments header is returned
    }
    */
}


//function user_isloggedin() {return false;}

//function user_ismember() {return true;}

//function user_getname() {return 'schneide2';}

/* OBSOLETE 
function db_query($string) {return false;}
function db_ei($string) {return false;}
function db_es($string) {return false;}
*/
?>
