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

# Number of entries to generate
NUM_ENTRIES = 10000
CHUNK_SIZE = 500

# List of possible 'Tipo' values
TIPOS = ['Pieza', 'Servicio']

try:
    # Connect to the database
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()
    print("Database connection successful!")

    # SQL query to insert data into DetallesCotizacion
    insert_query = """
    INSERT INTO DetallesCotizacion (
        CotizacionId, Tipo, PiezaId, ServicioId, Descripcion, Cantidad,
        PrecioUnitario, Subtotal, Notas, CreatedAt
    )
    VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
    """

    # Generate data
    data = []
    for _ in range(NUM_ENTRIES):
        CotizacionId = random.randint(1, 1000)  # Assuming 1000 existing quotes
        Tipo = random.choice(TIPOS)
        PiezaId = random.randint(1, 500) if Tipo == 'Pieza' else None
        ServicioId = random.randint(1, 200) if Tipo == 'Servicio' else None
        Descripcion = faker.sentence(nb_words=6)
        Cantidad = random.randint(1, 20)
        PrecioUnitario = round(random.uniform(50, 2000), 2)
        Subtotal = round(Cantidad * PrecioUnitario, 2)
        Notas = faker.text(max_nb_chars=200) if random.random() > 0.7 else None  # 30% chance of having notes
        CreatedAt = faker.date_time_between(start_date='-1y', end_date='now')

        data.append((
            CotizacionId, Tipo, PiezaId, ServicioId, Descripcion, Cantidad,
            PrecioUnitario, Subtotal, Notas, CreatedAt
        ))

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
