<?php
$mbox = imap_open ("{192.168.1.61:110/pop3/novalidate-cert}INBOX", "admin", "123456") or die('Cannot connect to server: ' . imap_last_error());

$emails = imap_search($mbox,'ALL');

if($emails) {

  $html = '';
				rsort($emails);

				foreach($emails as $result) {
					$overview = imap_fetch_overview($mbox,$result,0);
					$message = imap_body($mbox,$result,0);
					$reply = imap_headerinfo($mbox,$result,0);

					$html.= '	<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#1'.$result.'">
												<span class="subject">'.substr(strip_tags($overview[0]->subject),0,50).'.. </span>
												<span class="from">'.$overview[0]->from.'</span>
												<span class="date">on '.$overview[0]->date.'</span>
											</a>
										</h4>
									</div>
									<div id="1'.$result.'" class="panel-collapse collapse">
										<div class="panel-body">
											<pre>'.$message.'<hr>From: '.$reply->from[0]->mailbox.'@'.$reply->from[0]->host.'</pre>
										</div>
									</div>
								</div>';
				}

				$html.= '</div>
					</div>
				</div>';
				echo $html;

}

imap_close($inbox);

?>
