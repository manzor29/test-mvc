{% extends layout %}
{% block content %}
<ul>
    {% for post in posts %}
        <li>
            Тема: {{ post.theme.title }}<br>
            Сообщение: {{ post.content }}<br>
            Автор: {{ post.user.name }}<br>
        </li>
        <br>
    {% endfor %}
</ul>
{% endblock %}