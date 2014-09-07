<html><head><title>Escaping Special Characters</title></head>
<body>
<h1>Escaping Special Characters</h1>

<pre>
<?php

// This file illustrates how special characters such as $ and \
// are handled in print() statements. When your purpose is to
// actually output a $ or \, or a delimiter such as single or
// double quotes, you must treat these special characters so that
// they are not interpreted -- this is known as "escaping" the
// characters.



print('Consult C:\temp\prices.txt for $SALE values.<br>');
print("Consult C:\\temp\\prices.txt for \$SALE values.<hr>");


// escaping single and double quotes
print('He said "hello" to me' . "\n");
print("He said \"hello\" to me\n<hr>");

print("He said 'hello' to me\n");
print('He said \'hello\' to me and I owe him $BIGBUCKS' . "\n");

print("Spot \t Spot \t Spot" . "\n");
print("\"I can't email you\" said the man to his dog \"Spot\"." . "\n");
?>
</pre>
</body></html>

