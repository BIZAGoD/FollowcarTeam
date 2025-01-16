import mysql.connector
from faker import Faker
from datetime import datetime
import random

# Create a Faker instance
faker = Faker()

# Database connection configuration
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'Followcar'
}

try:
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()
    print("Database connection successful!")

    # SQL query to insert into CategoriasServicio
    insert_query = """
    INSERT INTO CategoriasServicio (Nombre, Descripcion, Icono, CreatedAt)
    VALUES (%s, %s, %s, %s)
    """

    # Generate and insert 10,000 entries
    data = []
    for _ in range(10000):
        Nombre = faker.word().capitalize()
        Descripcion = faker.text(max_nb_chars=200)
        Icono = random.choice(['icon-home', 'icon-user', 'icon-service', 'icon-star'])
        CreatedAt = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
        data.append((Nombre, Descripcion, Icono, CreatedAt))

    # Insert in chunks to prevent timeout
    CHUNK_SIZE = 500
    for i in range(0, len(data), CHUNK_SIZE):
        chunk = data[i:i + CHUNK_SIZE]
        cursor.executemany(insert_query, chunk)
        conn.commit()
        print(f"Inserted {len(chunk)} rows.")

    print("All rows inserted successfully!")

except mysql.connector.Error as err:
    print(f"Error: {err}")

finally:
    if conn.is_connected():
        cursor.close()
        conn.close()
        print("Database connection closed.")
