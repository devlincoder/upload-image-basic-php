# Upload Image to Database with PHP

# $_FILES["name"]

- Tên file => $_FILES["name"]["name"]; 
- Đường dẫn tới file => $_FILES["my_image"]["tmp_name"];
- Tên chỉ mục : jpg,txt,mp3,..... => pathinfo($_FILES["name"]["name"] , PATHINFO_EXTENSION);

# Di chuyển File tới Thư mục
-`move_uploaded_file($_FILES["my_image"]["tmp_name"],path tới thư mục)`