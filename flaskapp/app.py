# from flask import Flask, request, jsonify
# from tensorflow.keras.models import load_model
# from tensorflow.keras.preprocessing import image
# import numpy as np
# import os

# app = Flask(__name__)
# model = load_model('mymodel.h5')

# @app.route('/predict', methods=['POST'])
# def predict():
#     img_file = request.files['image']
#     img_path = '../laravel/public/images/' + img_file.filename
#     img_file.save(img_path)

#     # img = image.load_img(img_path, target_size=(224, 224))
#     # img_array = image.img_to_array(img)
#     # img_array = np.expand_dims(img_array, axis=0)
    
#     img = image.load_img(img_path, target_size=(90, 3), color_mode='grayscale')
#     img_array = image.img_to_array(img)
#     img_array = np.expand_dims(img_array, axis=0)
#     img_array = np.expand_dims(img_array, axis=3)

#     predictions = model.predict(img_array)
#     predicted_class = np.argmax(predictions, axis=1)
    
#     os.remove(img_path)

#     return jsonify({'prediction': int(predicted_class)})

# if __name__ == '__main__':
#     app.run(debug=True)


from flask import Flask, request, jsonify
from tensorflow.keras.models import load_model
from tensorflow.keras.preprocessing import image
import numpy as np
import os

app = Flask(__name__)
model = load_model('mymodel.h5')

@app.route('/predict', methods=['POST'])
def predict():
    img_file = request.files['image']
    img_path = '../laravel/public/images/' + img_file.filename
    img_file.save(img_path)

    img = image.load_img(img_path, target_size=(224, 224))
    img_array = image.img_to_array(img)
    img_array = np.expand_dims(img_array, axis=0)

    predictions = model.predict(img_array)
    predicted_class = np.argmax(predictions, axis=1)
    classes = ['dark', 'green', 'light', 'medium']
    predicted_label = classes[int(predicted_class)]

    os.remove(img_path)

    return jsonify({'prediction': predicted_label})

if __name__ == '__main__':
    app.run(debug=True)
