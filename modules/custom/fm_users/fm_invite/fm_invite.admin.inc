<?php

/**
 * @file
 * */

function fm_invite_list() {
	
	$result = db_query('SELECT * FROM {fm_invite} ORDER BY timestamp DESC');
	$rows = array();
	$header = array('Name/E-mail', 'Date', 'Invite Code',  'Sign-Ups', 'Link View Count (Clicks)' );
	
	while($row = $result->fetchObject()) {
		$reg_code_url =  url('invite/'.$row->reg_code, array('absolute' => TRUE));
		$number = db_query("SELECT COUNT(*) FROM {fm_invite} WHERE referred_by_id = :id", array(':id' => $row->id))->fetchField();
		
		$rows[] = array($row->email, 
		  format_date($row->timestamp), 
		  $reg_code_url, 
		  (($number > 0) ? l($number, 'admin/fadmashion/invite/'.$row->id) : 0), 
		  $row->link_back_views
		);
	}
	
	$output = '<h1>Count: ' . db_query("SELECT COUNT(*) FROM {fm_invite} ")->fetchField().'</h1>'; 
	$output .= theme ('table', array('header' => $header, 'rows' => $rows));
	
	return $output;
}

function fm_invite_list_detailed($inviter_id) {
	$result = db_query('SELECT * FROM {fm_invite} WHERE referred_by_id = :id', array(':id' => $inviter_id));
	$rows = array();
	$header = array('Name/E-mail', 'Date');
	$count = 0; 
	while($row = $result->fetchObject()) {
		$reg_code_url =  url('invite/'.$row->reg_code, array('absolute' => TRUE));
		$rows[] = array($row->email, 
		  format_date($row->timestamp), 
		);
		$count++;
	}
	
	drupal_set_title('Sign ups for '.db_query("SELECT email FROM {fm_invite} WHERE id = :id",
	                 array(':id' => $inviter_id))->fetchField());
	                 
	drupal_set_breadcrumb(array(l(t('Home'), NULL), l(t('Full Invite List'), 'admin/fadmashion/invite')));
	$output = '<h1>Count: ' . $count . '</h1>';
	$output .= theme ('table', array('header' => $header, 'rows' => $rows));
	
	return $output;
}
