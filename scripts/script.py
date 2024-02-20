# from datetime import datetime

# print(sys.version)
# print("Python executable:", sys.executable)
# import os

# 確認したい環境変数の名前
from PIL import Image
import pytesseract
import io
import sys
import base64
import pyocr

# 画像処理

image64_data = sys.argv[1]

# Base64デコード
image_data = base64.b64decode(image64_data)

# Base64デコードされた画像データをImageオブジェクトに変換
image = Image.open(io.BytesIO(image_data))

result = pytesseract.image_to_string(image, lang="jpn")


tools = pyocr.get_available_tools()
tool = tools[0]

builder = pyocr.builders.TextBuilder(tesseract_layout=6)
text = tool.image_to_string(image, lang="jpn", builder=builder)


# 抽出した文字を出力
print(text)
