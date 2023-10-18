matrix = [
    # bay 1
    [#[0][2][1]
        [1,2,3],
        [4,5,6],
        [7,8,9]
    ],
    # bay 2 -> kosong semua
    [
        [0,0,0],
        [0,0,0],
        [0,0,0]
    ]
]
# matrix[0][1][1] -> 5
# bongkar
# 1 -> Rp1000.0000
# 2 -> Rp1000.0000
# 5 -> Rp1000.0000
# 8 -> Rp1000.0000
# 4jt

# [1,2,5] -> denda karna tidak disusun

# susun
# 8 -> Rp2.000.000
# 2jt 

# 6jt

temp = []

while (True):
    print("STATE KAPAL")
    
    for i in range(3):
        for j in range(3):
            print(matrix[i][j], end = " ")
        print()
    
    print("===MENU SIMPLE GAME===")
    print("1. Bongkar")
    print("2. Susun")
    print("3. Keluar")
    
    if (len(temp) != 0):
        print("KONTAINER YANG DAPAT DISUSUN")
        for i in temp:
            print(i, end= " ")
        print()
    
    pilihan = int(input("Pilihan: "))
    
    if pilihan == 3:
        exit(0)
        
    elif pilihan == 1:
        print("Bongkar")
        kolom = int(input("Input kolom berapa: "))
        baris = int(input("Input baris berapa: "))
        temp.append(matrix[baris][kolom])
        matrix[baris][kolom] = 0
        
    elif pilihan == 2:
        print("Susun")
        kolom = int(input("Input kolom berapa: "))
        baris = int(input("Input baris berapa: "))
        container = int(input("Input container apa: "))
        matrix[baris][kolom] = container