using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class buyanimal : MonoBehaviour {
 
    public Text feedbackmsg;
    public GameObject panel;
    // Use this for initialization
    void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
		
	}

    public void buychick() {
   
        int chickex= 500 * Savedata.buy_chick;
        if (Savedata.money >= chickex)
        {
            Savedata.chick = Savedata.chick + Savedata.buy_chick;
            Savedata.money = Savedata.money - chickex;
            StartCoroutine(sentchickdata());
            print(Savedata.money);
            print(Savedata.buy_chick);
            panel.SetActive(true);
        }
        else
        {
            feedbackmsg.CrossFadeAlpha(100f, 0f, false);
            feedbackmsg.color = Color.red;
            feedbackmsg.text = "餘額不足";
            print(Savedata.money);
            print(Savedata.buy_chick);
        }
    }
    public void buypig()
    {

        int pigex = 1000 * Savedata.buy_pig;
        if (Savedata.money >= pigex)
        {
            Savedata.pig = Savedata.pig + Savedata.buy_pig;
            Savedata.money = Savedata.money - pigex;
            StartCoroutine(sentpigdata());
            print(Savedata.money);
            print(Savedata.buy_pig);
            panel.SetActive(true);
        }
        else
        {
            feedbackmsg.CrossFadeAlpha(100f, 0f, false);
            feedbackmsg.color = Color.red;
            feedbackmsg.text = "餘額不足";
            print(Savedata.money);
            print(Savedata.buy_pig);
        }
    }
    public void buyox()
    {

        int oxex = 1500 * Savedata.buy_ox;
        if (Savedata.money >= oxex)
        {
            Savedata.ox = Savedata.ox + Savedata.buy_ox;
            Savedata.money = Savedata.money - oxex;
            StartCoroutine(sentoxdata());
            print(Savedata.money);
            print(Savedata.buy_ox);
            panel.SetActive(true);
        }
        else
        {
            feedbackmsg.CrossFadeAlpha(100f, 0f, false);
            feedbackmsg.color = Color.red;
            feedbackmsg.text = "餘額不足";
            print(Savedata.money);
            print(Savedata.buy_ox);
        }
    }

    public void buyfeed()
    {

        int feedex = 300 * Savedata.buy_feed;
        if (Savedata.money >= feedex)
        {
            Savedata.feed = Savedata.feed + Savedata.buy_feed;
            Savedata.money = Savedata.money - feedex;
            StartCoroutine(sentfeeddata());
            print(Savedata.money);
            print(Savedata.buy_feed);
            panel.SetActive(true);
        }
        else
        {
            feedbackmsg.CrossFadeAlpha(100f, 0f, false);
            feedbackmsg.color = Color.red;
            feedbackmsg.text = "餘額不足";
            print(Savedata.money);
            print(Savedata.buy_ox);
        }
    }
    IEnumerator sentchickdata()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "buychick");
        form.AddField("userid", Savedata.email);
        form.AddField("money", Savedata.money);
        form.AddField("chick", Savedata.buy_chick);

        WWW www2 = new WWW("http://163.17.135.213/accounting/buyani.php", form);
        yield return www2;
        if (!string.IsNullOrEmpty(www2.error))
        {
            Debug.Log(www2.error);
        }
        Debug.Log(www2.text);
        string b = www2.text;
        b = b.Replace(" ", "");
        b = b.Replace("\r", "");
        b = b.Replace("\n", "");
        b = b.Replace("\t", "");
        b = b.Replace("</br>", "");
      //  Savedata.id = b;

    }
    IEnumerator sentpigdata()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "buypig");
        form.AddField("userid", Savedata.email);
        form.AddField("money", Savedata.money);
        form.AddField("pig", Savedata.buy_pig);

        WWW www2 = new WWW("http://163.17.135.213/accounting/buyani.php", form);
        yield return www2;
        if (!string.IsNullOrEmpty(www2.error))
        {
            Debug.Log(www2.error);
        }
        Debug.Log(www2.text);
        string b = www2.text;
        b = b.Replace(" ", "");
        b = b.Replace("\r", "");
        b = b.Replace("\n", "");
        b = b.Replace("\t", "");
        b = b.Replace("</br>", "");
        //Savedata.id = b;

    }
    IEnumerator sentoxdata()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "buyox");
        form.AddField("userid", Savedata.email);
        form.AddField("money", Savedata.money);
        form.AddField("ox", Savedata.buy_ox);

        WWW www2 = new WWW("http://163.17.135.213/accounting/buyani.php", form);
        yield return www2;
        if (!string.IsNullOrEmpty(www2.error))
        {
            Debug.Log(www2.error);
        }
        Debug.Log(www2.text);
        string b = www2.text;
        b = b.Replace(" ", "");
        b = b.Replace("\r", "");
        b = b.Replace("\n", "");
        b = b.Replace("\t", "");
        b = b.Replace("</br>", "");
      //  Savedata.id = b;

    }
    IEnumerator sentfeeddata()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "buyfeed");
        form.AddField("userid", Savedata.email);
        form.AddField("money", Savedata.money);
        form.AddField("feed", Savedata.buy_feed);

        WWW www2 = new WWW("http://163.17.135.213/accounting/buyani.php", form);
        yield return www2;
        if (!string.IsNullOrEmpty(www2.error))
        {
            Debug.Log(www2.error);
        }
        Debug.Log(www2.text);
        string b = www2.text;
        b = b.Replace(" ", "");
        b = b.Replace("\r", "");
        b = b.Replace("\n", "");
        b = b.Replace("\t", "");
        b = b.Replace("</br>", "");
       // Savedata.id = b;

    }
}
