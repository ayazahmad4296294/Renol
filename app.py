from flask import Flask, request, jsonify, send_from_directory
import json
import os

app = Flask(__name__)

# Simple in-memory storage for demo purposes
users = []

@app.route('/')
def index():
    return send_from_directory('.', 'index.html')

@app.route('/contact.html')
def contact():
    return send_from_directory('.', 'contact.html')

@app.route('/style.css')
def style():
    return send_from_directory('.', 'style.css')

@app.route('/form.css')
def form_css():
    return send_from_directory('.', 'form.css')

@app.route('/script.js')
def script():
    return send_from_directory('.', 'script.js')

@app.route('/assets/<path:path>')
def assets(path):
    return send_from_directory('assets', path)

@app.route('/login', methods=['POST'])
def login():
    data = request.get_json()
    email = data.get('email')
    password = data.get('password')
    
    user = next((u for u in users if u['email'] == email and u['password'] == password), None)
    if user:
        return jsonify({'success': True, 'message': 'Login successful!'})
    else:
        return jsonify({'success': False, 'message': 'Invalid email or password.'})

@app.route('/signup', methods=['POST'])
def signup():
    data = request.get_json()
    name = data.get('name')
    email = data.get('email')
    phone = data.get('phone')
    password = data.get('password')
    confirm_password = data.get('confirmPassword')
    
    if password != confirm_password:
        return jsonify({'success': False, 'message': 'Passwords do not match.'})
    
    if any(u['email'] == email for u in users):
        return jsonify({'success': False, 'message': 'Email already registered.'})
    
    users.append({
        'name': name,
        'email': email,
        'phone': phone,
        'password': password
    })
    
    return jsonify({'success': True, 'message': 'Sign up successful!'})

if __name__ == '__main__':
    app.run(debug=True)