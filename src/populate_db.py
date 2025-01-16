import mysql.connector
from faker import Faker

# Configuration for MySQL connection
db_config = {
    'host': '127.0.0.1',
    'user': 'root',  # Replace with your MySQL username
    'password': '',  # Replace with your MySQL password
    'database': 'Followcar'  # Replace with your database name
}

# Initialize Faker
fake = Faker()

# Connect to the database
try:
    connection = mysql.connector.connect(**db_config)
    cursor = connection.cursor()

   # Table to insert data into
    table = 'CategoriasInventario'

    # Prepare the SQL INSERT query
    sql_query = f"""
    INSERT INTO {table} (Id, Nombre, Descripcion, CreatedAt)
    VALUES (%s, %s, %s, %s)
    """

    # Generate 10,000 entries
    data = []
    for i in range(1, 10001):
        row = (
            i,  # Auto-incrementing ID
            fake.word().capitalize(),  # Random word for 'Nombre'
            fake.text(max_nb_chars=200),  # Random description
            fake.date_time_this_decade()  # Random datetime for 'CreatedAt'
        )
        data.append(row)

    # Insert data into the table in chunks
    chunk_size = 1000
    for i in range(0, len(data), chunk_size):
        cursor.executemany(sql_query, data[i:i+chunk_size])
        connection.commit()
        print(f"Inserted {i + chunk_size} rows...")

    print("Data insertion complete!")

except mysql.connector.Error as err:
    print(f"Error: {err}")
finally:
    if connection.is_connected():
        cursor.close()
        connection.close()
