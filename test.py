import os
import webbrowser
import requests
from bs4 import BeautifulSoup
import socket

def rgba_to_rgb(hex_color):
    # Assuming a white background, so the background RGB is (255, 255, 255)
    background_r, background_g, background_b = 255, 255, 255

    # Extract RGBA from hex
    r = int(hex_color[1:3], 16)
    g = int(hex_color[3:5], 16)
    b = int(hex_color[5:7], 16)
    a = int(hex_color[7:9], 16) / 255.0  # Convert to a scale of 0 pto 1

    # Calculate new RGB by blending the original color with the background
    new_r = round((1 - a) * background_r + a * r)
    new_g = round((1 - a) * background_g + a * g)
    new_b = round((1 - a) * background_b + a * b)

    # Convert RGB back to hex
    return f"#{new_r:02X}{new_g:02X}{new_b:02X}"


def transform_string(input_string):
    replacements = [(":", ""), ("@", ""), ("®", ""), ("®", ""),("'s","")]
    for old, new in replacements:
        input_string = input_string.replace(old, new)
    transformed_string = input_string.lower().replace(' ', '-')
    return transformed_string


def transform_string_no_space(input_string):
    replacements = [("\n",""),(' ',""),("\t", ""),("\s","")]
    for old, new in replacements:
        input_string = input_string.replace(old, new)
    return input_string


def read_file_to_list(file_path):
    # Tạo danh sách rỗng để lưu trữ các dòng từ tệp tin
    lines = []

    # Mở tệp tin với chế độ đọc (read mode)
    with open(file_path, 'r', encoding='utf-8') as file:
        # Đọc từng dòng trong tệp tin và thêm vào danh sách
        for line in file:
            # Loại bỏ ký tự xuống dòng (\n) ở cuối mỗi dòng
            lines.append(line.strip())

    return lines

# Mở file ở chế độ ghi (write mode)
with open('pythontest\\ha1.txt', 'w') as file:
   for i in range(19):
       # Tính chữ cái tương ứng
        char = chr(ord('a') + i)
        # Nếu không phải là lần lặp cuối cùng, thêm '\n'
        if i < 18:
            file.write(char + '\n')
        else:
            file.write(char)


def convert_urls(urls):
    new_urls = []
    for url in urls:
        parts = url.split('/')
        app_id = parts[4]
        new_url = f"https://steamdb.info/app/{app_id}/"
        new_urls.append(new_url)
    return new_urls



f = "pythontest\\ha.txt"
f1 = "pythontest\\ha1.txt"

colors = [
    "#a86cb64d",
]
input_string = [
    "Diablo® IV",
]
lines_list = read_file_to_list(f)
lines_list1 = read_file_to_list(f1)

# print(lines_list)

# for color in colors:
#     converted = rgba_to_rgb(color)
#     print(f"{color} -> {converted}")

# for i in lines_list:
#     result = transform_string(i)
#     lines_list[i] = result


# for index in range(len(lines_list)):
#     result = transform_string(lines_list[index])
#     lines_list[index] = result

# print(lines_list)
# print(lines_list1)

# folder_path = 'img\\article\\ha'



# # Mở file trong chế độ ghi (write mode)
# with open(folder_path, 'w') as file:
#     # Duyệt qua từng phần tử trong danh sách
#     for item in lines_list:
#         # Ghi phần tử vào file, mỗi phần tử trên một dòng
#         file.write(f"{item}\n")



# for i in range(1, 20):
#     create_file = open(f'pythontest\\{i}.txt', 'w')

# _, _, files = next(os.walk("img\\article\\ha"))
# file_count = len(files)
# print(file_count)



# if len(lines_list) != file_count:
#     print("Số lượng tên file mới không khớp với số lượng file trong thư mục.")
# else:
#     files = os.listdir(folder_path)
#     files.sort()  # Sắp xếp danh sách file theo thứ tự chữ cái
#     # Lặp qua từng file trong thư mục và đổi tên
#     for i, file_name in enumerate(files):
#         old_path = os.path.join(folder_path, file_name)
#         # Lấy phần mở rộng của file cũ
#         extension = os.path.splitext(file_name)[1]
#         # Tạo đường dẫn mới với tên mới và phần mở rộng cũ
#         new_path = os.path.join(folder_path, lines_list[i] + extension)
#         os.rename(old_path, new_path)

file_link = "pythontest\\name\\link_list.txt"
link_list = read_file_to_list(file_link)

with open('pythontest\\name\\content_id.txt', 'w', encoding='utf-8') as file:
    file.write('')


def get_content_from_url(link_list, selector, value):
    for url_link in link_list:
        response = requests.get(url_link)
        if response.status_code == 200:
            # Phân tích cú pháp HTML của trang web
            soup = BeautifulSoup(response.content, 'html.parser')
            # Lấy nội dung của phần tử theo id, class, hoặc tag
            element = soup.find('div', {f"{selector}": f"{value}"})
            if element:
                # Lấy nội dung text của phần tử
                if(element.has_attr('data-price-final')):
                    price_final = element.get('data-price-final')
                    with open('pythontest\\name\\content_id.txt', 'a', encoding='utf-8') as file:
                        file.write(content + '\n')
                        print("Đã ghi " + f"{value}")
                else:
                    content = element.get_text().strip()
                    with open('pythontest\\name\\content_id.txt', 'a', encoding='utf-8') as file:
                        file.write(content + '\n')
                        print("Đã ghi " + f"{value}")
                # Ghi nội dung vào file txt
                
            else:
                print("Không tìm thấy phần tử theo yêu cầu.")
        else:
            print(f"Yêu cầu không thành công, mã trạng thái: {response.status_code}")



selector_value_list = read_file_to_list("pythontest\\name\\selector_value.txt")
selectorValue = []

for i in range(0, len(selector_value_list), 2):
    selectorValue.append((selector_value_list[i], selector_value_list[i+1]))


for selector, value in selectorValue:
    get_content_from_url(link_list, selector, value)


original_urls  = read_file_to_list("pythontest\\name\\link_list.txt")
converted_urls = convert_urls(original_urls)
for url in converted_urls:
     with open('pythontest\\name\\converted_link.txt', 'a', encoding='utf-8') as file:
         file.write(url + '\n')

