using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;


public class sellani : MonoBehaviour {
    public Text feedbackmsg;
    public Text chick;
    public Text pig;
    public Text ox;
    public GameObject panel;
    // Use this for initialization
    void Start () {
        StartCoroutine(checkchickdata());
        StartCoroutine(checkpigdata());
        StartCoroutine(checkoxdata());
    }
	
	// Update is called once per frame
	void Update () {
    
    }

    public void sellchick()
    {
       
        print("Savedata:"+Savedata.id);
        int chickex = 1500 * Savedata.sell_chick;
        if (Savedata.chick_up >= Savedata.sell_chick)
        {
            Savedata.chick = Savedata.chick - Savedata.sell_chick;
            Savedata.money = Savedata.money + chickex;
            StartCoroutine(sentchickdata());
            print(Savedata.money);
            print(Savedata.sell_chick);
            StartCoroutine(checkchickdata());
            panel.SetActive(true);
        }
        else {
            feedbackmsg.CrossFadeAlpha(100f, 0f, false);
            feedbackmsg.color = Color.red;
            feedbackmsg.text = "售出失敗";
            print(Savedata.money);
            print(Savedata.sell_chick);
            print(Savedata.chick_up);
        }

    }

    IEnumerator checkchickdata()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "checksellchick");
        form.AddField("id", Savedata.id);
        form.AddField("money", Savedata.money);
        form.AddField("chick", Savedata.sell_chick);

        WWW www2 = new WWW("http://163.17.135.213/accounting/sellani.php", form);
        yield return www2;
        if (!string.IsNullOrEmpty(www2.error))
        {
            Debug.Log(www2.error);
        }
        Debug.Log(www2.text);
        string b = www2.text;
        Savedata.chick_up = int.Parse(b);
        chick.text = b;
        print(Savedata.chick_up);

    }
    IEnumerator sentchickdata()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "sentsellchick");
        form.AddField("id", Savedata.id);
        form.AddField("money", Savedata.money);
        form.AddField("chick", Savedata.sell_chick);
        WWW www = new WWW("http://163.17.135.213/accounting/sellani.php", form);
        yield return www;
        Debug.Log("sell:" + www.text);
        if (!string.IsNullOrEmpty(www.error))
        {
            Debug.Log(www.error);
        }
        Debug.Log("sell:"+www.text);

    }
    public void sellpig()
    {
       
        print("Savedata:" + Savedata.id);
        int pigex = 3000 * Savedata.sell_pig;
        if (Savedata.pig_up >= Savedata.sell_pig)
        {
            Savedata.pig = Savedata.pig - Savedata.sell_pig;
            Savedata.money = Savedata.money + pigex;
            StartCoroutine(sentpigdata());
            StartCoroutine(checkpigdata());
            print(Savedata.money);
            print(Savedata.sell_pig);
            panel.SetActive(true);
        }
        else
        {
            feedbackmsg.CrossFadeAlpha(100f, 0f, false);
            feedbackmsg.color = Color.red;
            feedbackmsg.text = "售出失敗";
            print(Savedata.money);
            print(Savedata.sell_pig);
            print(Savedata.pig_up);
        }

    }

    IEnumerator checkpigdata()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "checksellpig");
        form.AddField("id", Savedata.id);
        form.AddField("money", Savedata.money);
        form.AddField("pig",Savedata.sell_pig);
        WWW www2 = new WWW("http://163.17.135.213/accounting/sellani.php", form);
        yield return www2;
        if (!string.IsNullOrEmpty(www2.error))
        {
            Debug.Log(www2.error);
        }
        Debug.Log(www2.text);
        string b = www2.text;
        Savedata.pig_up = int.Parse(b);
        print(Savedata.pig_up);
        pig.text = b;
    }
    IEnumerator sentpigdata()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "sentsellpig");
        form.AddField("id", Savedata.id);
        form.AddField("money", Savedata.money);
        form.AddField("pig", Savedata.sell_pig);
        WWW www = new WWW("http://163.17.135.213/accounting/sellani.php", form);
        yield return www;
        Debug.Log("sell:" + www.text);
        if (!string.IsNullOrEmpty(www.error))
        {
            Debug.Log(www.error);
        }
       
    }
    public void sellox()
    {
       
        print("Savedata:" + Savedata.id);
        int oxex = 10000 * Savedata.sell_ox;
        if (Savedata.ox_up >= Savedata.sell_ox)
        {
            Savedata.ox = Savedata.ox - Savedata.sell_ox;
            Savedata.money = Savedata.money + oxex;
            StartCoroutine(sentoxdata());
            StartCoroutine(checkoxdata());
            print(Savedata.money);
            print(Savedata.sell_ox);
            panel.SetActive(true);
        }
        else
        {
            feedbackmsg.CrossFadeAlpha(100f, 0f, false);
            feedbackmsg.color = Color.red;
            feedbackmsg.text = "售出失敗";
            print(Savedata.money);
            print(Savedata.sell_ox);
            print(Savedata.ox_up);
        }

    }

    IEnumerator checkoxdata()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "checksellox");
       
        form.AddField("id", Savedata.id);
         form.AddField("money", Savedata.money);
        form.AddField("ox", Savedata.sell_ox);
   

        WWW www2 = new WWW("http://163.17.135.213/accounting/sellani.php", form);
        yield return www2;
        if (!string.IsNullOrEmpty(www2.error))
        {
            Debug.Log(www2.error);
        }
        Debug.Log(www2.text);
        string b = www2.text;
        Savedata.ox_up = int.Parse(b);
        print(Savedata.ox_up);
        ox.text = b;
    }
    IEnumerator sentoxdata()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "sentsellox");
        form.AddField("id", Savedata.id);
        form.AddField("money", Savedata.money);
        form.AddField("ox", Savedata.sell_ox);
        WWW www = new WWW("http://163.17.135.213/accounting/sellani.php", form);
        yield return www;
        Debug.Log("sell:" + www.text);
        if (!string.IsNullOrEmpty(www.error))
        {
            Debug.Log(www.error);
        }
  
    }

}
