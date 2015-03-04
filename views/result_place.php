<html>
<head>
        <title>Places</title>
</head>
<body>
    <h1>Here are all the places you've been :</h1>
    {% if tasks is not empty %}
    <ul>
        {% for place in places %}

        <li>{{ place.getPlace }}</li>
        {% endfor %}
    </ul>
    {% endif %}

    <form action='/places' method='post'>
        <label for='place'>Place description :</label>
        <input id='place' name='place' type='text'>

        <button type='submit'>Add place</button>
    </form>
    <form action='/delete_places' method='post'>
        <button type='submit'>Delete</button>
    </form>   
</body>
</html>
