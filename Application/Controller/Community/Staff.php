<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Controller_Community_Staff extends Resource_Controller
{
	public function __Construct()
	{
		
	}
	
	public function Render()
	{
		$rankname = array(
			3 => 'Moderators In Opleiding', 
			4 => 'Moderators', 
			5 => 'Hoofd Moderators', 
			6 => 'Assistent Hotel Managers', 
			7 => 'Hotel Eigenaren');
			
		for($i = 7; $i > 2; $i--)
		{
			$tpl = new Library_View();
			$tpl->assign('rank->title', $rankname[$i]);
			$tpl->render('simple'.DS.'community'.DS.'staff');
			
			$result = $this->rModel->driver->prepare('SELECT * FROM users WHERE rank = ?')->bind_param($i)->execute();
			$content = array();
			while($row = $result->fetch_assoc())
			{
				$item = new Library_View();
				$item->render('simple'.DS.'community'.DS.'staff-item');
					
				$item->assign('rank->item->username', $row['username']);
				$item->assign('rank->item->last_online', nicedate($row['last_online']));
				
				$content[] = $item->execute();
			}
			
			$tpl->assign('rank->items', implode($content));
			$this->lView->parse($tpl->execute());
		}
	}
}
?>