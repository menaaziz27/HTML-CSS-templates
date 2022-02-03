from flask import Flask
from flask_pymongo import pymongo
from app import app

CONNECTION_STRING = "mongodb+srv://root:admin@mycluster.dlfkm.mongodb.net/url-shortener?retryWrites=true&w=majority"
client = pymongo.MongoClient(CONNECTION_STRING)
db = client.get_database('url-shortener')
user_collection = pymongo.collection.Collection(db, 'user_collection')
