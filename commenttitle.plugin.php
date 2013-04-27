<?php

/*
Copyright (c) 2013 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. */


// the post comment class appends a new name to Harabi's ATOM feed title for the main comment feed
class CommentTitle extends Plugin
{
	// the following function is needed to work with the comments ATOM feed
	public function action_atom_get_comments($xml, $params, $handler_vars)
	{
		// check if feed is the comment feed and executes the code in the block
		if ( Controller::get_action() == 'comments' ) 
		{
			// if the condition is true, the following appends a new name for the feed with the name of the blog
			$xml->title = 'Comments - ' . Utils::htmlspecialchars( Options::get( 'title' ) );
			
			// the following changes the description, or subtitle, as the ATOM standard calls it, and makes it reflect the feed
			$xml->subtitle = ' comments made on ' . Utils::htmlspecialchars( Options::get( 'title' ) );
		}
	}
} // end class
?>