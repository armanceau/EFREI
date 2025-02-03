from flask import Flask, jsonify
import psycopg2

app = Flask(__name__)

# Connexion à la base de données PostgreSQL
conn = psycopg2.connect(
    dbname='postgres',
    user='root',
    password='root',
    host='localhost',
    port='5432'
)
cur = conn.cursor()

@app.route('/get_count', methods=['GET'])
def get_count():
    # Récupère le nombre de clics depuis la base de données
    cur.execute("SELECT count FROM clics WHERE id = 1")
    count = cur.fetchone()[0] if cur.rowcount > 0 else 0
    return jsonify({'count': count})

if __name__ == '__main__':
    app.run(host='0.0.0.0', debug=True)