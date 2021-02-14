<?php

if (! function_exists('xml_convert'))
{
	function set_status(string $value, array $row): string
	{
		return $value === '1' ? 'Active' : 'Inactive';
	}

	function action_links(string $value, array $row): string
	{
		return '<a href="'.base_url('customers/'.$value).'">View</a>';
	}
}
