<?php
define( 'API_ACCESS_KEY', 'AAAAtL2SF1A:APA91bGBdtMf7Ao7NJhvMuDhs3Zp5gn-8LST0ZxMuu1AgXu7GW-yj5V9nprASDyID3apXfck0LLf6ZsUinwRP6lzMvEjDlpmxgua2S3NbGf8hfM61v-4_Fo_kH4QryjvlLgm-b3VQ5E0' );
define( 'FIREBASE_SEND_URL', 'https://fcm.googleapis.com/fcm/send' );
class FirebaseNotificationClass {
	function __construct() {

	}
    /**
     * Sending Push Notification
     */
    public function send_notification($registratoin_ids, $message) {
    	$msg = array
    	(
    		'title'		=> 'Firebase Notification',
    		'message'	=> $message,
    		'type'		=> 'message'
    	);
    	$fields = array
    	(
    		'registration_ids' 	=> array($registratoin_ids) ,
    		'data'			=> $msg
    	);

    	$headers = array
    	(
    		'Authorization: key=' . API_ACCESS_KEY,
    		'Content-Type: application/json'
    	);
    	$ch = curl_init();
    	curl_setopt( $ch,CURLOPT_URL, FIREBASE_SEND_URL );
    	curl_setopt( $ch,CURLOPT_POST, true );
    	curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    	curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    	curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    	curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    	$result = curl_exec($ch );
    	curl_close( $ch );
    }
}
?>