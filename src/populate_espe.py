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
    'password': '',  # Add your MySQL password here
    'database': 'Followcar'
}

# Number of entries to generate
NUM_ENTRIES = 10000
CHUNK_SIZE = 100

try:
    # Connect to the database
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()
    print("Database connection successful!")

    # SQL query to insert data into Especialidades
    insert_query = """
    INSERT INTO Especialidades (
        Nombre, Descripcion, CreatedAt
    )
    VALUES (%s, %s, %s)
    """

    # Generate data
    data = []
    for _ in range(NUM_ENTRIES):
        Nombre = faker.job()  # Generate a random specialty/job title
        Descripcion = faker.text(max_nb_chars=200) if random.random() > 0.3 else None
        CreatedAt = faker.date_time_between(start_date='-1y', end_date='now')

        data.append((Nombre, Descripcion, CreatedAt))

    # Insert data in chunks
    for i in range(0, len(data), CHUNK_SIZE):
        chunk = data[i:i + CHUNK_SIZE]
        cursor.executemany(insert_query, chunk)
        conn.commit()
        print(f"Inserted {len(chunk)} rows.")

    print("All rows inserted successfully!")

except mysql.connector.Error as err:
    print(f"Error: {err}")
    conn.rollback()

finally:
    if conn.is_connected():
        cursor.close()
        conn.close()
        print("Database connection closed.")
