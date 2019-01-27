import requests
import json
import csv
import numpy as np
import pandas

'''
Accidently used json.load() instead of .json(). Then I went crazy parsing shit to make it work. Don't make my mistake. To be fair it's 4am
'''

def getBeta(ticker):
	try:
	#beta call
		beta = float(requests.get("https://api-v2.intrinio.com/data_point/{}/beta/number?api_key=OjFiOWUxMTJjMDMyOTdhZDVlNTc4ZDA2YmYxNTZhNmYw".format(ticker)).content)
	except Exception:
		return "NA"
	return beta

def getSector(ticker):
	try:
		#sector call
		sector = requests.get("https://api-v2.intrinio.com/data_point/{}/sector?api_key=OjFiOWUxMTJjMDMyOTdhZDVlNTc4ZDA2YmYxNTZhNmYw".format(ticker)).content.decode("utf-8")
	except Exception:
		return "NA"
	return sector

def callBalanceSheet(ticker):
	#balance sheet call
	balanceSheet = str(requests.get("https://financialmodelingprep.com/api/financials/balance-sheet-statement/{}".format(ticker)).content)
	balanceSheet = balanceSheet[7:len(balanceSheet)-6]
	balanceSheet.replace("\\n", "")
	balanceSheet = ' '.join(balanceSheet.split())
	balanceSheet = balanceSheet.replace("\\n", "")
	balanceSheet = balanceSheet.replace("\\", "")
	balanceSheet = json.loads(balanceSheet)
	return balanceSheet

def callIncome(ticker):
	#income sheet call
	incomeSheet = str(requests.get("https://financialmodelingprep.com/api/financials/income-statement/{}".format(ticker)).content)
	incomeSheet = incomeSheet[7:len(incomeSheet)-6]
	incomeSheet.replace("\\n", "")
	incomeSheet = ' '.join(incomeSheet.split())
	incomeSheet = incomeSheet.replace("\\n", "")
	incomeSheet = incomeSheet.replace("\\", "")
	incomeSheet = json.loads(incomeSheet)
	return incomeSheet

def callCashFlow(ticker):
	#cash sheet call
	cashSheet = str(requests.get("https://financialmodelingprep.com/api/financials/cash-flow-statement/{}".format(ticker)).content)
	cashSheet = cashSheet[7:len(incomeSheet)-6]
	cashSheet.replace("\\n", "")
	cashSheet = ' '.join(cashSheet.split())
	cashSheet = cashSheet.replace("\\n", "")
	cashSheet = cashSheet.replace("\\", "")
	cashSheet = cashSheet.replace("<", "")
	#print(cashSheet[4481])
	cashSheet = json.loads(cashSheet)
	return cashSheet

def getLiab(ticker):
	try:
		sheetKeys = list(balanceSheet[ticker]["Additional paid-in capital"].keys())
	except Exception:
		return "NA"
	max = 0
	for i in range(len(sheetKeys)):
		year = int(sheetKeys[i][:-3])
		if (year > max) and not (balanceSheet[ticker]["Total liabilities"][sheetKeys[i]] == ""):
			ref = sheetKeys[i]
			max = year
	#print(max)
	return balanceSheet[ticker]["Total liabilities"][ref]

def getStockEquity(ticker):
	try:
		sheetKeys = list(balanceSheet[ticker]["Total stockholders' equity"].keys())
	except Exception:
		return "NA"
	max = 0
	for i in range(len(sheetKeys)):
		year = int(sheetKeys[i][:-3])
		if (year > max) and not (balanceSheet[ticker]["Total stockholders' equity"][sheetKeys[i]] == ""):
			ref = sheetKeys[i]
			max = year
	#print(max)
	return balanceSheet[ticker]["Total stockholders' equity"][ref]

def getTotalAssets(ticker):
	try:
		sheetKeys = list(balanceSheet[ticker]["Total current assets"].keys())
	except Exception:
		return "NA"
	max = 0
	for i in range(len(sheetKeys)):
		year = int(sheetKeys[i][:-3])
		if (year > max) and not (balanceSheet[ticker]["Total current assets"][sheetKeys[i]] == ""):
			ref = sheetKeys[i]
			max = year
	#print(max)
	return balanceSheet[ticker]["Total current assets"][ref]

def getNetIncome(ticker):
	try:
		sheetKeys = list(incomeSheet[ticker]["Net income"].keys())
	except Exception:
		return "NA"
	max = 0
	for i in range(len(sheetKeys)):
		try:
   			year = int(sheetKeys[i][:-3])
		except Exception:
   			pass
		
		if (year > max) and not (incomeSheet[ticker]["Net income"][sheetKeys[i]] == ""):
			ref = sheetKeys[i]
			max = year
	#print(max)
	return incomeSheet[ticker]["Net income"][ref]

def getFreeCash(ticker):
	try:
		sheetKeys = list(cashSheet[ticker]["Free cash flow"].keys())
	except:
		return "NA"
	max = 0
	for i in range(len(sheetKeys)):
		try:
			year = int(sheetKeys[i][:-3])
		
		
			if (year > max) and not (cashSheet[ticker]["Free cash flow"][sheetKeys[i]] == ""):
				ref = sheetKeys[i]
				max = year
		
			return cashSheet[ticker]["Free cash flow"][ref]
		except Exception:
			return "NA"
	
#open sp CSV and create list of tickers
def openTickers(fileName):
	colNames = ['', 'company', 'headquarters', 'industry', 'sector', 'symbol']
	data = pandas.read_csv(fileName, names=colNames)
	tickers = data.symbol.tolist()
	return tickers[1:]


sp500 = openTickers("./sp500")

ROE = ""
DTE = ""
with open('financials.csv', 'a') as f:
	f.write(",ticker, liabilities, equity, netincome, freecashflow, beta, ROE, debttoequity, assets, sector" + '\n')
	for i, ticker in enumerate(sp500):
		print(ticker)
		beta = getBeta(ticker)
		balanceSheet = callBalanceSheet(ticker)
		incomeSheet = callIncome(ticker)
		cashSheet = callCashFlow(ticker)
		try:
			DTE = float(getLiab(ticker))/float(getStockEquity(ticker))
		except Exception:
			DTE = "NA"

		try:
			ROE = float(getNetIncome(ticker))/float(getStockEquity(ticker))
		except Exception:
			ROE = "NA"
		f.write("{},{},{},{},{},{},{},{},{},{},{}\n".format(i, ticker, getLiab(ticker), getStockEquity(ticker), getNetIncome(ticker), getFreeCash(ticker), beta, ROE, DTE, getTotalAssets(ticker), getSector(ticker)))
