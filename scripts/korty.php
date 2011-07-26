<?php

function usage()
{
	return <<<USAGE



USAGE;
}

$commands = array(
	'new_project'      => array('n', 'new'),
	'generate' => array('g', 'generate'),
);


foreach($argv as $command)
{
	foreach($commands as $key => $available_commands)
	{
		if(in_array($command, $available_commands))
		{
			$key();
		}
	}
}

function new_project()
{
	echo "new =]";
}

function generate()
{
	
}