<?php 
class Module {	
	private $data;	
	public function list_module($xyz,$module)
	{
		if($xyz == 'dir_mod')
		{
			$menues = array(
				'print'	    => array('konter','toko','spg','masspg','retur','tat','rekrut'),
				'home'      => array('home'),
				'master'	  => array('master','mtoko','mkonter'),
				'hrd'	 			=> array('pak'),
				'import'	  => array('import')
			);
			$res = array();
			foreach($menues as $key)
			{
				$res = array_merge_recursive($res,$key);
			}
			return $res;
		}
		else if($xyz == 'act')
		{
			return array(
				$module.'_create',
				$module.'_read',
				$module.'_update',
				$module.'_pilih',
				$module.'_delete'
			);
		}		
	}
	
	public function cek_request_mod($module)
	{
		if(!in_array($module,$this->list_module($xyz = 'dir_mod', $module)))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function notifikasi($level,$module,$action)
	{
		if($this->cek_request_mod($module) === false && (in_array($action,$this->list_module($xyz = 'act', $module))))
		{
			$data =
			'<div id="maincontainer">
					<div class="container-fluid wraperrmod">
						<div class="panel panel-warning">
							<div class="panel-heading"><h3 class="panel-title">This is notification</h3></div>
							<div class="panel-body">
								<blockquote>
									<p>	
										Level: <strong>'.$level.'</strong><br/>
										Request module: <strong>'.$module.'</strong><br/>
										Action module: <strong>'.$action.'</strong><br/>
										Register status: <strong class="text-success"><span class="label label-danger">Module [404]</span> <span class="label label-success">Action [202]</span></strong><br/>
										Access: <strong class="text-danger">Not found in module</strong>										
									</p>
									<footer>vxims</footer>
								</blockquote>
							</div>
							<div class="panel-footer">Causes: Wrong page address.</div>
						</div>
					</div>
				</div>';
		}
		else if($this->cek_request_mod($module) === false && (!in_array($action,$this->list_module($xyz = 'act', $module)))){
			$data =
			'<div id="maincontainer">
					<div class="container-fluid wraperrmod">
						<div class="panel panel-warning">
							<div class="panel-heading"><h3 class="panel-title">This is notification</h3></div>
							<div class="panel-body">
								<blockquote>
									<p>	
										Level: <strong>'.$level.'</strong><br/>
										Request module: <strong>'.$module.'</strong><br/>
										Action module: <strong>'.$action.'</strong><br/>
										Register status: <strong class="text-success"><span class="label label-danger">Module [404]</span> <span class="label label-danger">Action [404]</span></strong><br/>
										Access: <strong class="text-danger">Not found in action</strong>										
									</p>
									<footer>vxims</footer>
								</blockquote>
							</div>
							<div class="panel-footer">Causes: Wrong page address.</div>
						</div>
					</div>
				</div>';
		}
		else if($this->cek_request_mod($module) === true && (in_array($action,$this->list_module($xyz = 'act', $module)))){
			$data =
			'<div id="maincontainer">
					<div class="container-fluid wraperrmod">
						<div class="panel panel-primary">
							<div class="panel-heading"><h3 class="panel-title">This is notification</h3></div>
							<div class="panel-body">
								<blockquote>
									<p>	
										Level: <strong>'.$level.'</strong><br/>
										Request module: <strong>'.$module.'</strong><br/>
										Action module: <strong>'.$action.'</strong><br/>
										Register status: <strong class="text-success"><span class="label label-success">Module [200]</span> <span class="label label-success">Action [200]</span></strong><br/>
										Access: <span class="label label-danger">Forbidden [403]</span>										
									</p>
									<footer>vxims</footer>
								</blockquote>
							</div>
							<div class="panel-footer">Causes: This notification is because the page you\'ve requested is prohibited.</div>
						</div>
					</div>
				</div>';
		}
		else if($this->cek_request_mod($module) === true && (!in_array($action,$this->list_module($xyz = 'act', $module)))){
			$data =
			'<div id="maincontainer">
					<div class="container-fluid wraperrmod">
						<div class="panel panel-primary">
							<div class="panel-heading"><h3 class="panel-title">This is notification</h3></div>
							<div class="panel-body">
								<blockquote>
									<p>	
										Level: <strong>'.$level.'</strong><br/>
										Request module: <strong>'.$module.'</strong><br/>
										Action module: <strong>'.$action.'</strong><br/>
										Register status: <strong class="text-success"><span class="label label-success">Module [200]</span> <span class="label label-danger">Action [404]</span></strong><br/>
										Access: <strong class="text-danger">Not found in action</strong>										
									</p>
									<footer>vxims</footer>
								</blockquote>
							</div>
							<div class="panel-footer">Causes: No one action like your request registered in the '.$module.'-module. Check the Module file at <span class="text-primary">ACTION CONFIGURATION</span></div>
						</div>
					</div>
				</div>';
		}
		return $data;
	}
}
