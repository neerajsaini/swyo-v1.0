<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader 
{
	function __construct()
	{
		parent::__construct();

		if(defined('SHARED_CI_PATH'))
		{
			$this->_ci_library_paths = array(APPPATH, SHARED_CI_PATH, BASEPATH);
			$this->_ci_helper_paths = array(APPPATH, SHARED_CI_PATH, BASEPATH);
			$this->_ci_model_paths = array(APPPATH, SHARED_CI_PATH );
			$this->_ci_view_paths = array(APPPATH.'views/'	=> TRUE , SHARED_CI_PATH.'views/'	=> TRUE);
		}
	}

	public function helper($helpers = array())
	{
		foreach ($this->_ci_prep_filename($helpers, '_helper') as $helper)
		{
			if (isset($this->_ci_helpers[$helper]))
			{
				continue;
			}

			$ext_helper = APPPATH.'helpers/'.config_item('subclass_prefix').$helper.'.php';
			$shared_ci_helper = !defined('SHARED_CI_PATH') ? FALSE : SHARED_CI_PATH.'helpers/'.config_item('subclass_prefix').$helper.'.php' ;
			// Is this a helper extension request?
			if (file_exists($ext_helper) OR file_exists($shared_ci_helper))
			{
				$base_helper = BASEPATH.'helpers/'.$helper.'.php';

				if ( ! file_exists($base_helper))
				{
					show_error('Unable to load the requested file: helpers/'.$helper.'.php');
				}

				if (file_exists($ext_helper)) include_once($ext_helper);
				if (file_exists($shared_ci_helper)) include_once($shared_ci_helper);
				include_once($base_helper);

				$this->_ci_helpers[$helper] = TRUE;
				log_message('debug', 'Helper loaded: '.$helper);
				continue;
			}

			// Try to load the helper
			foreach ($this->_ci_helper_paths as $path)
			{
				if (file_exists($path.'helpers/'.$helper.'.php'))
				{
					include_once($path.'helpers/'.$helper.'.php');

					$this->_ci_helpers[$helper] = TRUE;
					log_message('debug', 'Helper loaded: '.$helper);
					break;
				}
			}

			// unable to load the helper
			if ( ! isset($this->_ci_helpers[$helper]))
			{
				show_error('Unable to load the requested file: helpers/'.$helper.'.php');
			}
		}
	}

	protected function _ci_load_class($class, $params = NULL, $object_name = NULL)
	{
		// Get the class name, and while we're at it trim any slashes.
		// The directory path can be included as part of the class name,
		// but we don't want a leading slash
		$class = str_replace('.php', '', trim($class, '/')); 

		// Was the path included with the class name?
		// We look for a slash to determine this
		$subdir = '';
		if (($last_slash = strrpos($class, '/')) !== FALSE)
		{
			// Extract the path
			$subdir = substr($class, 0, $last_slash + 1);

			// Get the filename from the path
			$class = substr($class, $last_slash + 1);
		}

		// We'll test for both lowercase and capitalized versions of the file name
		foreach (array(ucfirst($class), strtolower($class)) as $class)
		{
			$subclasses[] = APPPATH.'libraries/'.$subdir.config_item('subclass_prefix').$class.'.php';
			$subclasses[] = SHARED_CI_PATH.'libraries/'.$subdir.config_item('subclass_prefix').$class.'.php';

			foreach($subclasses as $subclass) 
			{
				// Is this a class extension request?
				if (file_exists($subclass))
				{
					$baseclass = BASEPATH.'libraries/'.ucfirst($class).'.php';

					if ( ! file_exists($baseclass))
					{
						log_message('error', "Unable to load the requested class: ".$class);
						show_error("Unable to load the requested class: ".$class);
					}

					// Safety:  Was the class already loaded by a previous call?
					if (in_array($subclass, $this->_ci_loaded_files))
					{
						// Before we deem this to be a duplicate request, let's see
						// if a custom object name is being supplied.  If so, we'll
						// return a new instance of the object
						if ( ! is_null($object_name))
						{
							$CI =& get_instance();
							if ( ! isset($CI->$object_name))
							{
								return $this->_ci_init_class($class, config_item('subclass_prefix'), $params, $object_name);
							}
						}

						$is_duplicate = TRUE;
						log_message('debug', $class." class already loaded. Second attempt ignored.");
						return;
					}

					include_once($baseclass);
					include_once($subclass);
					$this->_ci_loaded_files[] = $subclass;

					return $this->_ci_init_class($class, config_item('subclass_prefix'), $params, $object_name);
				}
			}

			// Lets search for the requested library file and load it.
			$is_duplicate = FALSE;
			foreach ($this->_ci_library_paths as $path)
			{
				$filepath = $path.'libraries/'.$subdir.$class.'.php';

				// Does the file exist?  No?  Bummer...
				if ( ! file_exists($filepath))
				{
					continue;
				}

				// Safety:  Was the class already loaded by a previous call?
				if (in_array($filepath, $this->_ci_loaded_files))
				{
					// Before we deem this to be a duplicate request, let's see
					// if a custom object name is being supplied.  If so, we'll
					// return a new instance of the object
					if ( ! is_null($object_name))
					{
						$CI =& get_instance();
						if ( ! isset($CI->$object_name))
						{
							return $this->_ci_init_class($class, '', $params, $object_name);
						}
					}

					$is_duplicate = TRUE;
					log_message('debug', $class." class already loaded. Second attempt ignored.");
					return;
				}

				include_once($filepath);
				$this->_ci_loaded_files[] = $filepath;
				return $this->_ci_init_class($class, '', $params, $object_name);
			}

		} // END FOREACH

		// One last attempt.  Maybe the library is in a subdirectory, but it wasn't specified?
		if ($subdir == '')
		{
			$path = strtolower($class).'/'.$class;
			return $this->_ci_load_class($path, $params);
		}

		// If we got this far we were unable to find the requested class.
		// We do not issue errors if the load call failed due to a duplicate request
		if ($is_duplicate == FALSE)
		{
			log_message('error', "Unable to load the requested class: ".$class);
			show_error("Unable to load the requested class: ".$class);
		}
	}
}