<html>
<h1>Twitter Bootstrap template</h1>
<h2>How to use</h2>
<ol>
	<li>Download Twitter Bootstrap from either
		<ul>
			<li><a href=""http://twitter.github.com/bootstrap/>http://twitter.github.com/bootstrap/</a> or</li>
			<li><a href="http://twitter.github.com/bootstrap/customize.html">http://twitter.github.com/bootstrap/customize.html</a></li>
		</ul>
	</li>
	<li>Get the code for one of <a href="http://twitter.github.com/bootstrap/getting-started.html#examples">the examples</a> by opening it, viewing the source, copying it, and pasting it into a new document such as index.php.</li>
	<li>Strip out any referencdes to '../assets/' in the code.</li>
	<li>Add the following line to the code, just above the HTML5 shim, thus:
		<pre>
			&lt;link href="application/application.css" rel="stylesheet"&gt;
		</pre>
	</li>	
	<li>Add the following line to the code, just below the footer, thus:
		<pre>
			&lt;script src="application/jquery.js"&gt;&lt;/script&gt;
		</pre>
	</li>
	<li>Use the folder called ico for putting the application icon files in.</li>
	<li>Use the folder called lib for putting jquery and other external library based functionality in.</li>
</ol>
</html>
touch README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin git@github.com:guitarbeerchocolate/bootstraptemplate.git
git push -u origin master
Push an existing repository from the command line

git remote add origin git@github.com:guitarbeerchocolate/bootstraptemplate.git
git push -u origin master