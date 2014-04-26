<?php
App::uses('AppModel', 'Model');
/**
* MuveTool Model
*
*/
class MuveTool extends AppModel {
public $useTable = 'muve_tools';

/**
 * Ensure the URL is explicit before saving
 * 
 * @param Array $options  
 * 
 * @return Bool
 */

public function beforeSave($options = array()) {
    if (!empty($this->data['MuveTool']['url'])) {
		if (stristr($this->data['MuveTool']['url'],'http'))
		{
			$this->data['MuveTool']['url']='http://' . $this->data['MuveTool']['url'];
		}
    }
    return true;
}

}

