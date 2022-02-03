from distutils.debug import DEBUG
from flask import Flask
# import db
import pymongo

app = Flask(__name__)

try:
    mongo = pymongo.MongoClient("mongodb+srv://root:admin@mycluster.dlfkm.mongodb.net/url-shortener?retryWrites=true&w=majority")    
    db = mongo.get_database('url-shortener')
    mongo.server_info()
except:
    print("Error - Cannot connect to db")

#test to insert data to the data base
@app.route("/test")
def test():
    db.db.collection.insert_one({"name": "John"})
    return "Connected to the data base!"


@app.route('/')
def flask_mongodb_atlas():
    return "flask mongodb atlas!"
if __name__ == '__main__':
    app.run(port=8000,debug=True)
    
# mongodb+srv://root:admin@mycluster.dlfkm.mongodb.net/myFirstDatabase?retryWrites=true&w=majority
