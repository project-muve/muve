<?php
App::uses('AppHelper', 'View/Helper');

class FileHelper extends AppHelper {
    public $helpers = array('Html','Session');
	
/**
 * Generates a tabular list of files in the specified directory
 * 
 * @param String $path 
 * 
 * @return String Directory List HTML
 */
    public function directoryListing($path) {
		$files = scandir(WWW_ROOT . $path);
		$html="";
		foreach($files as $file)
		{
			$html .= '<tr><td>' . $file . '</td><td>' . $this->actionButtons($path . DIRECTORY_SEPARATOR  . $file) .'</td></tr>';
		}
		return '<table class="table table-striped">' . $html . '</table>';
    }
    /**
     * Generates a thumbnail gallery of the specified directory
     * 
     * @param String $path 
     * 
     * @return String Image Gallery HTML
     */
	
    public function imageGallery($path) {
		$files = scandir(WWW_ROOT . $path);
		$html="";
		foreach($files as $file)
		{
			$html .= '<li class="span3"><div class="thumbnail"><div class="text-center"><img src="' . $this->webroot . $path . '/' . $file . '"/><p><strong>' . $file . '</strong></p>' . $this->actionButtons($path . DIRECTORY_SEPARATOR  . $file) .'</div></div></li>';
		}
		return '<ul class="thumbnails">' . $html . '</ul>';
    }
	
/**
 * Perform filesystem actions before the content is rendered.
 * 
 * @param String $viewFile 
 */

	public function beforeRenderFile($viewFile)
	{
		parent::beforeRenderFile($viewFile);
		if ($this->Auth->user()){
		if (isset($this->request->query['delete']))
		{
			if (file_exists(WWW_ROOT . $this->request->query['delete']))
			{
				unlink(WWW_ROOT . $this->request->query['delete']);
			}
		}
		}
	}
/**
 * Add styles and scripts to the page
 * 
 * @param String $viewFile 
 */

	public function beforeLayout($viewFile)
	{
		parent::beforeLayout($viewFile);

		echo $this->Html->script("shadowbox",array('inline'=>false));
		echo $this->Html->css("shadowbox",array('inline'=>false));
		echo $this->Html->scriptBlock('
		$(function() {
		Shadowbox.init({
			handleOversize: "drag",
			modal: true
		});});',array('inline'=>false));
	}
/**
 * Generate the action buttons to interact with the specified file
 * 
 * @param String $path 
 * 
 * @return String Button group HTML
 */

	private function actionButtons($path)
	{
		$html = '<a href="' . $this->webroot . $path . '" class="btn" rel="shadowbox"><i class="icon-search"></i> View</a>';
		$html .= '<a href="' . $this->webroot . $path . '" class="btn"><i class="icon-file"></i> Download</a>';
		$html .= '<a href="' . $this->here .'?delete=' . $path . '" class="btn btn-danger"><i class="icon-trash icon-white"></i> Delete</a>';
		return '<div class="btn-group">' .  $html . '</div>';
	}
}