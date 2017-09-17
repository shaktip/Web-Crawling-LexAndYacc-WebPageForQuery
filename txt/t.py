import csv
for i in range(1,37):
    text_file = open("Output"+str(i)+".txt", "w")
    s = str(i) + '.csv'
    with open(s) as csvfile:
        readCSV = csv.reader(csvfile)
        for row in readCSV:
            for i in range(0,len(row)) :
                text_file.write(row[i] + "\n");
        csvfile.close()
    text_file.close()    
  
