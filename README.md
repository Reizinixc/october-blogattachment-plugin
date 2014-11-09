# Blog File Attachment plugin
This plugin extends the [RainLab Blog plugin](https://github.com/rainlab/blog-plugin) with file attachment features.

## Plugin dependency
This plugin wants you to install RainLab Blog plugin first.

## How to install
```bash
composer require reizinixc/blogattachment && echo /plugins/reizinixc/blogattachment >> .gitignore
```

## How to use
After install this plugin, you will see the "Attachments" option in "Manage" tab.

### How to attach files
If you can upload featured images, you can upload files by click the plus icon and choose the files.

### How to get attached files
When you retrieve the blog post. You can get all attached files by `attachments` attribute e.g. `posts.attachments` and get attached files by iterating through `attachments` or use an array index.

Here are some accessible fields of attachment object. 

Fields        |           Description
--------------|--------------------------------
content_type  | Get MIME type of file
created_at    | Get a creation datetime of file
description   | Get a file description
extension     | Get a file extension
file_name     | Get a file name
file_size     | Get a file size in Bytes
path          | Get a download URI of file
title         | Get a file title

### Example usage
```twig
{% for attachment in post.attachments %}
    <a href="{{ attachment.path }}">{{ attachment.file_name }} ({{ attachment.file_size }}B)</a>
{% endfor %}
```

## Found bugs/Translation/Enhancement
I will salute you if you create an issue or a pull request. Please feel free to do it :)

## License
MIT
