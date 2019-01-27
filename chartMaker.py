import requests
import json
import csv
import numpy as np
import pandas
import datetime
import matplotlib.pyplot as plt
from time import sleep



def getPrices(ticker):
	response = requests.get("https://www.alphavantage.co/query?function=TIME_SERIES_WEEKLY&symbol={}&apikey=W0D2OJRNWGDETLUS".format(ticker)).json()
	return(response["Weekly Time Series"])
	
def getEachPrice(weeks):
	return float(prices[timePeriod(weeks)]['1. open'])

def timePeriod(givenWeeks):
	date = datetime.datetime.now() - datetime.timedelta(days=2) - datetime.timedelta(weeks=givenWeeks)
	return "{}-".format(date.year) + "{:02d}".format(date.month) + "-" + "{:02d}".format(date.day)

def timePeriodDatetime(givenWeeks):
	date = datetime.datetime.now() - datetime.timedelta(days=2) - datetime.timedelta(weeks=givenWeeks)
	return date

#open sp CSV and create list of tickers
def openTickers(fileName):
	colNames = ['', 'company', 'headquarters', 'industry', 'sector', 'symbol']
	data = pandas.read_csv(fileName, names=colNames)
	tickers = data.symbol.tolist()
	return tickers[1:]


sp500 = openTickers("./sp500")

for j, ticker in enumerate(sp500[32:]):
	prices = getPrices(ticker)
	values = []
	dates = []
	for i in range(39):
		values.insert(0, getEachPrice(i))
		#values.append(i**2)
		dates.append(timePeriod(i)) #timePeriod(i)

	#print(values)
	#print(dates)

	plt.plot(dates, values)
	#plt.plot([1, 2, 3, 4], [1, 4, 9, 66])
	plt.ylabel('Price ($)')
	plt.xlabel('Date')
	plt.title(ticker + " Stock Price, Last 9 Months")

	fig, ax2 = plt.subplots() #plt.subplots(1, figsize=9)

	ax2.plot(dates, values)
	ax2.set_xticks(dates[::5])
	ax2.set_xticklabels(dates[::5], rotation=45)
	ax2.set_title(ticker + " Stock Price, Last 9 Months")

	ax2.set_xlabel('Date')
	ax2.set_ylabel('Price ($)')
	plt.tight_layout()
	plt.savefig('./images/{}.png'.format(ticker))
	plt.clf()
	sleep(15)

	

