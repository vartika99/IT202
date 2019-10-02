<html>
<head>
        <script>
        function newDivElement(){
                var newDivElement = document.createElement ('div');
                newDivElement.textContent = 'new element added';
                console.log(newDivElement);
                
		document.body.append(newDivElement);
        }
        </script>
</head>
<body onload="newDivElement();">
</body>
</html>
